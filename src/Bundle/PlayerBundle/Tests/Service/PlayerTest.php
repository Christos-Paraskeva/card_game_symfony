<?php

namespace Bundle\PlayerBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Bundle\PlayerBundle\Service\Player;

class PlayerTest extends WebTestCase
{

    private $player;
    protected static $kernel;
    protected static $container;

    protected function setUp()
    {
        self::$kernel = new \AppKernel('test', true);
        self::$kernel->boot();
        self::$container = self::$kernel->getContainer();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

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
        $testNewPlayer = $this->player->createPlayer('PlayerEntity Name', '1');
        $this->assertInstanceOf(Player::class, $testNewPlayer);
    }

//    public function testCanSavePlayerToAndLoadFromDatabase()
//    {
////        $this->player->getDoctrineService($this->em);
//        $this->player->savePlayer($this->em);
////        $players = $this->player->loadPlayers($this->em);
////        var_dump($players);
//        $lastName = array_values(array_slice($players, -1))[0];
//        $this->assertEquals($lastName->getName(), 'Test Name');
//    }

}