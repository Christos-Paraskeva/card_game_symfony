<?php

namespace Bundle\DealerBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
//use Bundle\PlayerBundle\Service\Player;

class DealerTest extends WebTestCase
{

    private $dealer;

    protected function setUp()
    {
        $this->dealer = new Dealer();
    }

    protected function tearDown()
    {
        $this->dealer = NULL;
    }

    public function testExists()
    {
        $this->assertInstanceOf(Dealer::class, $this->dealer);
    }

}