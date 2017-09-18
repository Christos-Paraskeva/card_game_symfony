<?php

namespace Bundle\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertContains('Test', $crawler->filter('#container h1')->text());
    }

    public function testWelcome()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/welcome');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertContains('Test', $crawler->filter('#container h1')->text());
    }
}
