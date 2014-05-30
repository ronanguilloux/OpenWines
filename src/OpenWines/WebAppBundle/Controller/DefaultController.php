<?php

namespace OpenWines\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package OpenWines\WebAppBundle\Controller
 */
class DefaultController extends Controller
{

    /**
     * indexAction
     *
     * @return Array
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
     * indexAction
     *
     * @return Array
     */
    public function indexAction()
    {
        return ['menu' => ['/regions']];
    }

}
