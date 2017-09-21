<?php

namespace Bundle\DealerBundle\Service;

use Bundle\ShuffleBundle\Service\Shuffle;


class Dealer {

    public function __construct ($shuffle = 1) {
        if ($shuffle == 1) {
            $this->shuffle = new Shuffle();
        }
        $this->currentPlayers = [];
    }

    public function shuffleTheDeck ($deck)
    {
        $this->shuffle->defaultShuffle($deck);
    }

    public function dealTheCards($howManyCards, $currentPlayers, $deck)
    {
        $this->currentPlayers = $currentPlayers;

        if (sizeof($deck) - (sizeof($currentPlayers) * $howManyCards) >= 0 && sizeof($currentPlayers) !== 0) {
            for($i=0; $i < $howManyCards; $i++) {
                for($p = 0; $p < sizeof($this->currentPlayers); $p++) {
                    array_push($this->currentPlayers[$p]->cardsHeld, array_splice($deck, 0, 1));
                }
            }
        } else {
            throw new \Exception('Cannot Deal: Not enough cards or players');
        }
    }

}