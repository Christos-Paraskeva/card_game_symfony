<?php

namespace Bundle\CardBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Bundle\CardBundle\Service\Card;

class CardTest extends WebTestCase
{
    private $card;

    protected function setUp()
    {
        $this->card = new Card(1, "Ace", "Heart", 1);
    }

    protected function tearDown()
    {
        $this->card = NULL;
    }

    public function testExists()
    {
        $this->assertInstanceOf(Card::class, $this->card);
    }

    public function testIsInitializedWithAValue()
    {
        $this->assertEquals($this->card->value, '1');
    }

    public function testIsInitializedWithAName()
    {
        $this->assertEquals($this->card->name, 'Ace');
    }

    public function testIsInitializedWithASuit()
    {
        $this->assertEquals($this->card->suit, 'Heart');
    }

    public function testIsInitializedWithAnOriginalDeckPosition()
    {
        $this->assertEquals($this->card->originalDeckPosition, 1);
    }

}