<?php

namespace Bundle\PlayerBundle\Service;

use Bundle\PlayerBundle\Entity\PlayerEntity;
use Doctrine\ORM\EntityRepository;

class Player {

    public function __construct ($name = null, $id = null, $currentPlayers = null) {
        $this->name = $name;
        $this->id = $id;
        $this->cardsHeld = [];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function showCards()
    {
        return $this->cardsHeld;
    }

    public function createPlayer ($name, $id)
    {
        return new Player($name, $id);
    }

    public function getDoctrineService($doctrineService)
    {
        $this->em = $doctrineService;
    }

    public function savePlayers($currentPlayers)
    {
            $playerEntity = new PlayerEntity();
            $playerEntity->setName('Christos');
            // make some changes to database
            $this->em->persist($playerEntity);
            $this->em->flush();
    }

}