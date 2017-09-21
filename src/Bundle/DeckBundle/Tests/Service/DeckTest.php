<?php

namespace Bundle\DeckBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Bundle\DeckBundle\Service\Deck;
use Bundle\CardBundle\Service\Card;


class DeckTest extends WebTestCase
{
    private $deck;

    protected function setUp()
    {
        // use mock type from workshop - not referring real class
        // should I use a double for card??

        $this->deck = new Deck();
        $this->testHelpers = new TestHelpers();
    }

    protected function tearDown()
    {
        $this->deck = NULL;
    }

    public function testExists()
    {
        $this->assertInstanceOf(Deck::class, $this->deck);
    }

    public function testIsInitializedWithAnArrayWithCorrectAmountOfNames()
    {
        $this->assertEquals(sizeof($this->deck->names), 13);
    }

    public function testIsInitializedWithAnArrayWithCorrectAmountOfSuits()
    {
        $this->assertEquals(sizeof($this->deck->suits), 4);
    }

//
    public function testIsInitializedWithAnEmptyArrayOfCards()
    {
        $this->assertEquals($this->deck->cards, []);
    }

    public function testArrayOfNamesIsCorrect()
    {
        $arrayOfNames = $this->testHelpers->CardNames();
        $this->assertEquals($this->deck->names, $arrayOfNames);
    }

    # maybe test for all contents of array?
    public function testFirstCardIsCorrectWhenCreatingADeck()
    {
        $this->deck->createDeck('standard');
        $this->assertEquals($this->deck->cards[0]->value, '1');
        $this->assertEquals($this->deck->cards[0]->name, 'Ace');
        $this->assertEquals($this->deck->cards[0]->suit, 'Hearts');
        $this->assertEquals($this->deck->cards[0]->originalDeckPosition, '1');
    }


    public function testLastCardIsCorrectWhenCreatingADeck()
    {
        $this->deck->createDeck('standard');
        $this->assertEquals($this->deck->cards[51]->value, '13');
        $this->assertEquals($this->deck->cards[51]->name, 'King');
        $this->assertEquals($this->deck->cards[51]->suit, 'Diamonds');
        $this->assertEquals($this->deck->cards[51]->originalDeckPosition, '52');
    }

    /**
     * @expectedException Exception
     * @doesNotPerformAssertions
     */
    public function testEdgeCaseThrowExceptionWhenNoDeckTypeIsSpecified()
    {
        # seems to just be testing the annotation - no assert needed?
        $this->assertEquals($this->testHelpers->formatArrayStructure($this->deck->createDeck()) );
    }

}