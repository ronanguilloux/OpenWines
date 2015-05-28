<?php
/**
 * This file is part of the OpenWines package.
 *
 * (c) 2015 Les Polypodes
 * Made in Nantes, France - http://lespolypodes.com
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 *
 * File created by ronan@lespolypodes.com (28/05/2015 - 09:43)
 */

namespace OpenWines\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TestsController extends Controller
{

    /**
     * A RAW JSON-LD output
     * @Route("/tests/1/{mode}", defaults={"mode" = "compact"})
     * @Cache(smaxage="1", ETag="'Tests1' ~ mode")
     * @Template()
     */
    public function indexAction($mode)
    {
        $context = (object)array(
            "sc" => "http://schema.org",
            "wn" => "https://schema.org/Winery"
        );

        $doc = (object)array(
            "@type" => "Winegrower",
            "businessRegistration" => "RCS Nantes 514582691",
            "isicV4" => "11.02",
            "sc:name" => "Durand Vigneron",
            "sc:faxNumber" => "+33 2 40 54 70 03",
            "sc:telephone" => "+33 2 40 54 70 03",
            "sc:email" => "mailto:durand.verteprairie@wanadoo.fr",
            "http://schema.org/url" => (object)array("@id" => "http://manu.sporny.org/"),
            "http://schema.org/image" => (object)array("@id" => "http://manu.sporny.org/images/manu.png")
        );

    }
}
