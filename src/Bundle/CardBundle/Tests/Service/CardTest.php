<?php

namespace Bundle\CardBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Bundle\CardBundle\Service\Card;

class CardTest extends WebTestCase
{
    private $card;

    protected function setUp()
    {
//        self::bootKernel();
//        $this->cardContainer = static::$kernel->getContainer()->get('app.card_generator');
//        var_dump($this->cardContainer->createCard(1, "Ace", "Heart", 1));
          $this->card = new Card(1, "Ace", "Heart", 1);
//          $this->card = $this->card->createCard(1, "Ace", "Heart", 1);

//        var_dump('hello');
//        var_dump($this->card);
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
        var_dump($this->card->value);
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