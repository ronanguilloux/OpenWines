<?php

namespace OpenWines\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package OpenWines\WebAppBundle\Controller
 */
class DefaultController extends BaseController
{

    /**
     * indexAction
     *
     * @param Request $request
     *
     * @return Array data
     */
    public function indexAction(Request $request)
    {
        $format         = $request->attributes->get('_format');
        $hateoasRoutes  = ['vignobles'];
        $baseUrl        = $this->getBaseUrl($request);
        $routes         = [];
        foreach ($hateoasRoutes as $route) {
            $routes[]   = [
                'label' => $route,
                'href'  => sprintf("%s/%s.%s", $baseUrl, $route, $format),
            ];
        }

        return ['apis' => $routes];
    }

    /**
     * vignoblesAction
     *
     * @return Array data
     */
    public function vignoblesAction()
    {
        return ['vignobles' => $vignobles = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vignoble')
            ->findAllOrderByName(), ];
    }

    /**
     * vignoblesAction
     *
     * @param int id
     *
     * @return Array data
     */
    public function vignobleAction($id)
    {
        return ['vignoble' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vignoble')
            ->find($id), ];
    }

    /**
     * AcosAction
     *
     * @param int $vignobleId
     *
     * @return Array data
     */
    public function appellationsAction($vignobleId)
    {
        $vignoble = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vignoble')
            ->find($vignobleId)
        ;

        return [
            'vignoble' => $vignoble,
            'appellations' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Appellation')
            ->findByVignoble($vignoble), ];
    }

    /**
     * AcoAction
     *
     * @param int $vignobleId
     * @param int $id
     *
     * @return Array data
     */
    public function appellationAction($vignobleId, $id)
    {
        $vignoble = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vignoble')
            ->find($vignobleId)
        ;

        return [
            'vignoble' => $vignoble,
            'appellation' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Appellation')
            ->find($id), ];
    }

    /**
     * cepagesAction
     *
     * @param int $vignobleId
     * @param int $AppellationId
     *
     * @return Array data
     */
    public function cepagesAction($vignobleId, $AppellationId)
    {
        $appellation = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Appellation')
            ->find($AppellationId)
        ;
        $vignoble = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vignoble')
            ->find($vignobleId)
        ;

        return ['cepages' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Cepage')
            ->findByAppellation($AppellationId), ];
    }
}
