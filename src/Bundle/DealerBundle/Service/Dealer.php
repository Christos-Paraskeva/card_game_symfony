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


//"strict mode";
//
//function Dealer(shuffle = new Shuffle()) {
//    this.currentPlayers = [];
//    this.shuffle = shuffle;
//}
//
//Dealer.prototype = {
//    shuffleTheDeck: function(deck) {
//        this.shuffle.defaultShuffle(deck);
//    },
//
//    dealTheCards: function(howManyCards, currentPlayers, deck) {
//        this.currentPlayers = currentPlayers;
//
//        if (deck.length - (currentPlayers.length * howManyCards) >= 0 && currentPlayers.length !== 0) {
//            for(var i=0; i < howManyCards; i++) {
//                for(var p=0; p < this.currentPlayers.length; p++) {
//                    this.currentPlayers[p].cardsHeld.push(deck.splice(0, 1));
//                }
//      }
//    }
//        else {
//            throw new Error("Cannot deal: not enough cards or players");
//        }
//    },
//};
//
//class Dealer {
//
//    public function __construct () {
//        $this->currentPlayers = [];
//    }