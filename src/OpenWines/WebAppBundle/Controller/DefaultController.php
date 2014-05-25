<?php

namespace OpenWines\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OpenWinesWebAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
