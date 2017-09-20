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
        # use mock type from workshop - not referring real class
        # do I need to use a double for card??

//        $cardDouble = $this->getMockBuilder(Card::class)
//            ->setConstructorArgs(array(1, 'Ace', 'Hearts', 1))
////            ->disableOriginalConstructor()
//            ->getMock();
//        $cardDouble->method('createCard')
//            ->will($this->returnSelf());
//
//        $cardDouble = new Card(1, djdjd, jdjd ,jdjd );
//        $card = new Card();

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
//        var_dump($this->deck->cardTemplate);
        $this->deck->createDeck('standard');
//        var_dump($this->deck->cards[0]);
        $this->assertEquals($this->deck->cards[0]->value, '1');
        $this->assertEquals($this->deck->cards[0]->name, 'Ace');
        $this->assertEquals($this->deck->cards[0]->suit, 'Hearts');
        $this->assertEquals($this->deck->cards[0]->originalDeckPosition, '1');

//        $formattedDeck = $this->testHelpers->formatArrayStructure($this->deck->createDeck('standard'));
//        $this->assertEquals($formattedDeck[0][0], 'Ace');
    }

//    public function testFirstMiddleCardIsCorrectWhenCreatingADeck()
//    {
////        var_dump($this->deck->cardTemplate);
//        $this->deck->createDeck('standard');
////        var_dump($this->deck->cards[0]);
//        $this->assertEquals($this->deck->cards[25]->value, '13');
//        $this->assertEquals($this->deck->cards[25]->name, 'King');
//        $this->assertEquals($this->deck->cards[25]->suit, 'Diamonds');
//        $this->assertEquals($this->deck->cards[25]->originalDeckPosition, '52');
//
////        $formattedDeck = $this->testHelpers->formatArrayStructure($this->deck->createDeck('standard'));
////        $this->assertEquals($formattedDeck[0][0], 'Ace');
//    }
//
//    public function testSecondMiddleCardIsCorrectWhenCreatingADeck()
//    {
////        var_dump($this->deck->cardTemplate);
//        $this->deck->createDeck('standard');
////        var_dump($this->deck->cards[0]);
//        $this->assertEquals($this->deck->cards[26]->value, '13');
//        $this->assertEquals($this->deck->cards[26]->name, 'King');
//        $this->assertEquals($this->deck->cards[26]->suit, 'Diamonds');
//        $this->assertEquals($this->deck->cards[26]->originalDeckPosition, '52');
//
////        $formattedDeck = $this->testHelpers->formatArrayStructure($this->deck->createDeck('standard'));
////        $this->assertEquals($formattedDeck[0][0], 'Ace');
//    }

    public function testLastCardIsCorrectWhenCreatingADeck()
    {
//        var_dump($this->deck->cardTemplate);
        $this->deck->createDeck('standard');
//        var_dump($this->deck->cards[0]);
        $this->assertEquals($this->deck->cards[51]->value, '13');
        $this->assertEquals($this->deck->cards[51]->name, 'King');
        $this->assertEquals($this->deck->cards[51]->suit, 'Diamonds');
        $this->assertEquals($this->deck->cards[51]->originalDeckPosition, '52');
//        $formattedDeck = $this->testHelpers->formatArrayStructure($this->deck->createDeck('standard'));
//        $this->assertEquals($formattedDeck[0][0], 'Ace');
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