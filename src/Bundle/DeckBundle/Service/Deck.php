<?php

namespace Bundle\DeckBundle\Service;

use Bundle\CardBundle\Service\Card;

// shall I use '\Bundle\CardBundle\Service\Card $cardTemplate' as contruct argument instead?
class Deck {
    public function __construct ($cardTemplate = 1) {

        if ($cardTemplate === 1) {
            $this->cardTemplate = new Card();
        }

        $this->names = ['Ace', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Jack', 'Queen', 'King'];
        $this->suits = ['Hearts', 'Clubs', 'Spades', 'Diamonds'];
        $this->cards = [];
    }

    /**
     * This method can throw an exception.
     *
     * @ throw Exception
     */
    public function createDeck($type = null) {

        if ($type === 'standard') {
            $positionInDeck = 1;
            for ($s = 0; $s < sizeof($this->suits); $s++) {
                for ($v = 0; $v < sizeof($this->names); $v++) {
                    array_push($this->cards, $this->cardTemplate->createCard($v+1, $this->names[$v], $this->suits[$s], $positionInDeck));
                    $positionInDeck += 1;
                }
            }
            return $this->cards;
        } else {
            # can maybe throw a better type of error here?
            throw new \Exception('Error: Must specify a type of Deck');
        }
    }

}