<?php

namespace OpenWines\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use OpenWines\WebAppBundle\Controller\BaseController;

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
        $hateoasRoutes  = ['regions'];
        $baseUrl        = $this->getBaseUrl($request);
        $routes         = [];
        foreach($hateoasRoutes as $route) {
            $routes[]   = [
                'label' => $route,
                'href'  => sprintf("%s/%s.%s", $baseUrl, $route, $format)
            ];
        }

        return ['apis' => $routes];
    }

    /**
     * regionsAction
     *
     * @return Array data
     */
    public function regionsAction()
    {
        $regions = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Region')
            ->findAllOrderByName();



        return ['regions' => $regions];
    }

    /**
     * regionsAction
     *
     * @param int id
     *
     * @return Array data
     */
    public function regionAction($id)
    {
        return $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Region')
            ->find($id);
    }

    /**
     * AcosAction
     *
     * @param int $regionId
     *
     * @return Array data
     */
    public function AocsAction($regionId)
    {
        $region = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Region')
            ->find($regionId)
        ;
        $aocs = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:AOC')
            ->findByRegion($region)
        ;

        return ['aocs' => $aocs ];
    }

    /**
     * AcoAction
     *
     * @param int $regionId
     * @param int $id
     *
     * @return Array data
     */
    public function AocAction($regionId, $id)
    {
        $aoc = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:AOC')
            ->find($id)
        ;

        return ['aoc' => $aoc];
    }


}
