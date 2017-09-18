<?php

namespace Bundle\DeckBundle\Tests\Service;

class TestHelpers {

    public function CardNames() {
        return ['Ace', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Jack', 'Queen', 'King'];
    }

    public function FormatArrayStructure($deck) {
        $formattedDeck = [];
        if (sizeof($formattedDeck) === 0) {
            for ($i = 0; $i < sizeof($deck); $i++) {
                if (sizeof($formattedDeck) < 52) {
                    array_push($formattedDeck, [$deck[$i]->name, $deck[$i]->suit, $deck[$i]->value, $deck[$i]->originalDeckPosition]);
                }
            }
        }
        return $formattedDeck;
    }

}