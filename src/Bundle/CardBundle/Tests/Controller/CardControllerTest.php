<?php

namespace Bundle\CardBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CardControllerTest extends WebTestCase
{
    public function testCardController()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cardtest');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertContains('Tests', $crawler->filter('#container h1')->text());
    }

}