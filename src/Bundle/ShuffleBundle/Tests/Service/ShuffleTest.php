<?php

namespace Bundle\ShuffleBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Bundle\ShuffleBundle\Service\Shuffle;

class ShuffleTest extends WebTestCase
{

    private $shuffle;

    protected function setUp()
    {
        $this->shuffle = new Shuffle();
    }
    protected function tearDown()
    {
        $this->shuffle = NULL;
    }
    public function testExists()
    {
        $this->assertInstanceOf(Shuffle::class, $this->shuffle);
    }
    public function testInitializesWithAVariableSetToFalseConfirmingWhetherTheShuffleHasBeenPerformedCorrectly()
    {
        $this->assertEquals($this->shuffle->correctShuffle, false);
    }
    public function testTheDefaultShuffleMethodDoesNotReturnAnyTwoCardsInSequence()
    {

        $cardDouble1 = $this->getMockBuilder('Card',  // the class name to mock
                                            array(),  // the methods to mock
                                            array(1, 'Ace', 'Hearts', 1));  // arguments to pass to constructor

        $cardDouble2 = $this->getMockBuilder('Card',
                                            array(),
                                            array(2, 'Two', 'Hearts', 2));

        $cardDouble3 = $this->getMockBuilder('Card',
                                            array(),
                                            array(3, 'Three', 'Hearts', 3));

        $cardDouble1->originalDeckPosition = 1;
        $cardDouble2->originalDeckPosition = 2;
        $cardDouble3->originalDeckPosition = 3;

        $invalidScenarioOne = array($cardDouble1, $cardDouble2, $cardDouble3);
        $invalidScenarioTwo = array($cardDouble2, $cardDouble3, $cardDouble1);
        $invalidScenarioThree = array($cardDouble3, $cardDouble1, $cardDouble2);
        $shuffledCards = $this->shuffle->defaultShuffle($invalidScenarioOne);

        $this->assertNotEquals($shuffledCards, null);
        $this->assertNotEquals($shuffledCards, $invalidScenarioOne);
        $this->assertNotEquals($shuffledCards, $invalidScenarioTwo);
        $this->assertNotEquals($shuffledCards, $invalidScenarioThree);
    }

//    /**
//     * @expectedException Exception
//     * @doesNotPerformAssertions
//     */
////    public function testEdgeCaseThrowExceptionWhenNoDeckTypeIsSpecified()
////    {
////        // seems to just be testing the annotation - no assert needed?
////        $deck = [1];
////        $this->assertEquals($this->shuffle->defaultShuffle($deck));
////    }

}