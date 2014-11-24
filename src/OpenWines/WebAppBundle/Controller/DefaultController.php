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
        $hateoasRoutes  = ['vineyards'];
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
     * vineyardsAction
     *
     * @return Array data
     */
    public function vineyardsAction()
    {
        return ['vineyards' => $vineyards = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vineyard')
            ->findAllOrderByName()];
    }

    /**
     * vineyardsAction
     *
     * @param int id
     *
     * @return Array data
     */
    public function vineyardAction($id)
    {
        return ['vineyard' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vineyard')
            ->find($id)];
    }

    /**
     * AcosAction
     *
     * @param int $vineyardId
     *
     * @return Array data
     */
    public function aocsAction($vineyardId)
    {
        $vineyard = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vineyard')
            ->find($vineyardId)
        ;
        return [
            'vineyard' => $vineyard,
            'aocs' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:AOC')
            ->findByVineyard($vineyard)];
    }

    /**
     * AcoAction
     *
     * @param int $vineyardId
     * @param int $id
     *
     * @return Array data
     */
    public function aocAction($vineyardId, $id)
    {
        $vineyard = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Vineyard')
            ->find($vineyardId)
        ;
        return [
            'vineyard' => $vineyard,
            'aoc' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:AOC')
            ->find($id)];
    }

    /**
     * cepagesAction
     *
     * @param int $vineyardId
     * @param int $AOCId
     *
     * @return Array data
     */
    public function cepagesAction($vineyardId, $AOCId)
    {
        return ['cepages' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OpenWinesWebAppBundle:Cepage')
            ->findByAOC($AOCId)];
    }

}
