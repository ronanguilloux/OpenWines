<?php
/**
 * Created by PhpStorm.
 * User: ronan
 * Date: 29/05/2014
 * Time: 11:17
 */
namespace OpenWines\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseController extends Controller
{

    /**
     * getBaseUrl
     *
     * @param Request $request
     *
     * @return string
     */
    protected function getBaseUrl(Request $request)
    {
        $kernel = $this->get('kernel');
        $kernel->getEnvironment(); // prod, dev, test
        $baseUrl = $request->getSchemeAndHttpHost();
        if ('dev' === $kernel->getEnvironment()) {
            // prod, dev, test
            $baseUrl .= "/app_dev.php";
        }

        return $baseUrl;
    }
}
