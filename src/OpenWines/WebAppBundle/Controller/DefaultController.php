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
        $hateoasRoutes  = ['vignobles'];
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
            ->findAllOrderByName()];
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
            ->find($id)];
    }

    /**
     * AcosAction
     *
     * @param int $vignobleId
     *
     * @return Array data
     */
    public function aocsAction($vignobleId)
    {
        $vignoble = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vignoble')
            ->find($vignobleId)
        ;
        return [
            'vignoble' => $vignoble,
            'aocs' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:AOC')
            ->findByVignoble($vignoble)];
    }

    /**
     * AcoAction
     *
     * @param int $vignobleId
     * @param int $id
     *
     * @return Array data
     */
    public function aocAction($vignobleId, $id)
    {
        $vignoble = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vignoble')
            ->find($vignobleId)
        ;
        return [
            'vignoble' => $vignoble,
            'aoc' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:AOC')
            ->find($id)];
    }

    /**
     * cepagesAction
     *
     * @param int $vignobleId
     * @param int $AOCId
     *
     * @return Array data
     */
    public function cepagesAction($vignobleId, $AOCId)
    {
        $aoc = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:AOC')
            ->find($AOCId)
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
            ->findByAOC($AOCId)];
    }

}
