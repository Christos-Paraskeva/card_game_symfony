<?php

namespace Bundle\DealerBundle\Service;


class Dealer {

    public function __construct () {
        $this->currentPlayers = [];
    }

    public function includeNewPlayer($player)
    {
        var_dump($this->currentPlayers);
        array_push($this->currentPlayers, $player);
        var_dump($this->currentPlayers);
    }

}