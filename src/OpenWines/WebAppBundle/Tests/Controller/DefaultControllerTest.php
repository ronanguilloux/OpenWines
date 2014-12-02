<?php

namespace OpenWines\WebAppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index.json');

        $this->assertTrue($crawler->filter(':contains("vignobles")')->count() > 0);
    }
}
