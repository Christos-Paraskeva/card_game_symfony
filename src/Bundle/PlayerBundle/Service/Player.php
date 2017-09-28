<?php

namespace Bundle\PlayerBundle\Service;

use Bundle\PlayerBundle\Entity\PlayerEntity;


class Player {

    public function __construct ($name = null, $id = null) {
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

    public function savePlayer($em)
    {
        $playerEntity = new PlayerEntity();
        $playerEntity->setName($this->name);
        $em->persist($playerEntity);
        $em->flush();
    }

}