<?php

namespace Bundle\ShuffleBundle\Service;

class Shuffle {

    public function __construct () {
        $this->correctShuffle = false;
    }

    public function defaultShuffle($deck) {
        $i = 0;
        $r = 0;
        $temp = null;
        if (sizeof($deck) !== 0) {
            while ($this->correctShuffle === false) {
                for ($i = sizeof($deck) - 1; $i > 0; $i -= 1) {
                    $r = @mt_rand(0, $i);
                    $temp = $deck[$i];
                    $deck[$i] = $deck[$r];
                    $deck[$r] = $temp;
                }
                self::_validateCorrectShuffle($deck);
            }
            return $deck;

        } else {
            echo 'THIS SHOULD BE AN ERROR';
        }
    }

    private function _validateCorrectShuffle ($deck) {
        $confirmedCardSequence = false;
        for ($i=0; $i < sizeof($deck) - 1; $i++) {
            if (($deck[$i]->originalDeckPosition - $deck[$i+1]->originalDeckPosition) === -1) {
                $confirmedCardSequence = true;
            }
        }
        if ($confirmedCardSequence === false) {
            $this->correctShuffle = true;
        }
    }

}