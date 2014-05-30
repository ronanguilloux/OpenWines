<?php
/**
 * Created by PhpStorm.
 * User: ronan
 * Date: 29/05/2014
 * Time: 17:12
 */

namespace OpenWines\WebAppBundle\EventListener\Kernel;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\Serializer;

/**
 * Class ApiResponseListener
 * @package OpenWines\WebAppBundle\EventListener\Kernel
 */
class ApiResponseListener
{

    private $twig;
    private $serializer;

    public function __construct(\Twig_Environment $twig, Serializer $serializer)
    {
        $this->twig       = $twig;
        $this->serializer = $serializer;
    }

    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $data       = $event->getControllerResult();
        $format     = $event->getRequest()->attributes->get('_format');
        $controller = $event->getRequest()->attributes->get('_controller');

        if('html' === $format) {
            $template = $this->guessTemplateName($controller);
            $content  = $this->twig->render($template, $data);
            $response = new Response($content, 200);

            $event->setResponse($response);
            return;
        }

        if(!in_array($format, ['json', 'xml'])) {
            throw new \Exception(sprintf("%s format is not supported yet!", $format));
        }

        $contentType = 'json' === $format ? 'application/json' : 'application/xml';
        $data        = is_array($data) && count($data) === 1 ? array_shift($data) : $data;
        $content     = $this->serializer->serialize($data, $format);

        $event->setResponse(new Response($content, 200, ['Content-Type' => $contentType]));


    }

    /**
     * guessTemplateName
     *
     * @param string $controllerName
     *
     * @return string
     */
    private function guessTemplateName($controllerName)
    {
        $exploded            = explode('\\', $controllerName);
        $bundleMember        = [];
        $explodedController  = explode('::', array_pop($exploded));

        foreach($exploded as $member) {
            if('Controller' === $member) {
                break;
            }
            $bundleMember[] = $member;
        }

        $bundleName     = implode('', $bundleMember);
        $controllerName = str_replace('Controller', '', $explodedController[0]);
        $actionName     = str_replace('Action', '', $explodedController[1]);

        return sprintf(
            '%s:%s:%s.html.twig',
            $bundleName,
            $controllerName,
            $actionName
        );



    }

}