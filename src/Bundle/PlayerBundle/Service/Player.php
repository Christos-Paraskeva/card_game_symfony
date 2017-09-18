<?php

namespace Bundle\PlayerBundle\Service;


class Player {

    public function __construct ($name, $id) {
        $this->name = $name;
        $this->id = $id;
        $this->cardsHeld = [];
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function showCards() {
        return $this->cardsHeld;
    }

    public function createPlayer ($name, $id) {
        return new Player($name, $id);
    }

}