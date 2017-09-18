<?php

namespace Bundle\DeckBundle\Service;

use Bundle\CardBundle\Service\Card;


class Deck {
    public function __construct () {
        $this->names = ['Ace', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Jack', 'Queen', 'King'];
        $this->suits = ['Hearts', 'Clubs', 'Spades', 'Diamonds'];
        $this->cards = [];
    }

    /**
     * This method can throw an exception.
     *
     * @throws Exception
     */
    public function createDeck($type = null) {

        if ($type === 'standard') {
            $positionInDeck = 1;
            for ($s = 0; $s < sizeof($this->suits); $s++) {
                for ($v = 0; $v < sizeof($this->names); $v++) {
                    array_push($this->cards, new Card($v+1, $this->names[$v], $this->suits[$s], $positionInDeck));
                    $positionInDeck += 1;
                }
            }
            return $this->cards;
        } else {
//            $error = 'Always throw this error';
//            var_dump('here');
            throw new \Exception('error');
//            var_dump('here2');
        }
    }

}