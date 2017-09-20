<?php

namespace Bundle\PlayerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlayerControllerTest extends WebTestCase
{
    public function testPlayerController()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/player');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertContains('Tests', $crawler->filter('#container h1')->text());
    }

}