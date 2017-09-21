<?php

namespace Bundle\PlayerBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Bundle\PlayerBundle\Service\Player;

class PlayerTest extends WebTestCase
{

    private $player;

    protected function setUp()
    {
        $this->player = new Player('Test Name', 1);
    }

    protected function tearDown()
    {
        $this->player = NULL;
    }

    public function testExists()
    {
        $this->assertInstanceOf(Player::class, $this->player);
    }

    public function testIsInitializedWithAName()
    {
        $this->assertEquals($this->player->name, 'Test Name');
    }

    public function testIsInitializedWithAnId()
    {
        $this->assertEquals($this->player->id, 1);
    }

    public function testIsInitializedWithAnEmptyArrayForCurrentlyHeldCards()
    {
        $this->assertEquals($this->player->cardsHeld, []);
    }

    public function testCanCheckForCurrentPlayerName()
    {
        $this->assertEquals($this->player->getName(), 'Test Name');
    }

    public function testCanCheckForCurrentPlayerId()
    {
        $this->assertEquals($this->player->getId(), 1);
    }

    public function testCanCheckForCurrentPlayerHeldCards()
    {
        $this->assertEquals($this->player->showCards(), []);
    }

    public function testCanCreateANewPlayer()
    {
        $testNewPlayer = $this->player->createPlayer('Player Name', '1');
        $this->assertInstanceOf(Player::class, $testNewPlayer);
    }

}