<?php

namespace Bundle\DealerBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Bundle\ShuffleBundle\Service\Shuffle;
use Bundle\DealerBundle\Service\Dealer;
use Bundle\DeckBundle\Service\Deck;

class DealerTest extends WebTestCase
{

    private $dealer;

    protected function setUp()
    {
      // should also try doubling the shuffle class and deck

        $playerDouble1 = $this->getMockBuilder('Player',
            array(),
            array());
        $playerDouble2 = $this->getMockBuilder('Player',
            array(),
            array());
        $playerDouble3 = $this->getMockBuilder('Player',
            array(),
            array());
        $playerDouble4 = $this->getMockBuilder('Player',
            array(),
            array());

        $playerDouble1->id = 1;
        $playerDouble2->id = 2;
        $playerDouble3->id = 3;
        $playerDouble4->id = 4;

        $playerDouble1->cardsHeld = [];
        $playerDouble2->cardsHeld = [];
        $playerDouble3->cardsHeld = [];
        $playerDouble4->cardsHeld = [];

        $this->currentPlayersDouble = [];

        array_push($this->currentPlayersDouble, $playerDouble1, $playerDouble2, $playerDouble3, $playerDouble4);

        $this->deck = new Deck();
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

    public function testIsInitializedWithAnEmptyArrayForTheCurrentPlayers()
    {
        $this->assertEquals($this->dealer->currentPlayers, []);
    }

    public function testIsInitializedWithAnInstanceOfShuffle()
    {
        $this->assertInstanceOf(Shuffle::class, $this->dealer->shuffle);
    }

//    public function testWhenShufflingTheCardsItCallsTheShuffleClassAndGivesItTheCards()
//    {
//        // use spy on shuffle method?
//    }

    public function testWhenDealingTheCardsItGivesEachPlayerTheCorrectAmountSpecified()
    {
        $this->deck = $this->deck->createDeck('standard');
        $this->dealer->dealTheCards(7, $this->currentPlayersDouble, $this->deck);
        $this->assertEquals(sizeof($this->dealer->currentPlayers[0]->cardsHeld), 7);
        $this->assertEquals(sizeof($this->dealer->currentPlayers[1]->cardsHeld), 7);
        $this->assertEquals(sizeof($this->dealer->currentPlayers[2]->cardsHeld), 7);
        $this->assertEquals(sizeof($this->dealer->currentPlayers[3]->cardsHeld), 7);
    }

    /**
     * @expectedException Exception
     * @doesNotPerformAssertions
     */
    public function testEdgeCaseThrowExceptionWhenNoDeckTypeIsSpecified()
    {
        $this->deck = $this->deck->createDeck('standard');
        $this->dealer->dealTheCards(14, $this->currentPlayersDouble, $this->deck);
        // seems to just be testing the annotation - no assert needed?
        $this->assertEquals($this->dealer->dealTheCards(14, $this->currentPlayersDouble, $deck));
    }

}