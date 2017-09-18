<?php

namespace Bundle\DeckBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DeckControllerTest extends WebTestCase
{
    public function testCardTest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deck');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertContains('Tests', $crawler->filter('#container h1')->text());
    }
    
}