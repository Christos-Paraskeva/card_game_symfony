<?php

namespace Bundle\DeckBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Bundle\DeckBundle\Service\Deck;

class DeckTest extends WebTestCase
{
    private $deck;

    protected function setUp()
    {
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
    public function testCardNameIsCorrectWhenCreatingADeck()
    {
        $formattedDeck = $this->testHelpers->formatArrayStructure($this->deck->createDeck('standard'));
        $this->assertEquals($formattedDeck[0][0], 'Ace');
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