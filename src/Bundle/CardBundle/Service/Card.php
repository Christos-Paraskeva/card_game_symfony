<?php

namespace Bundle\CardBundle\Service;

class Card
{
    public function __construct ($value, $name, $suit, $originalDeckPosition)
    {
        $this->value = $value;
        $this->name = $name;
        $this->suit = $suit;
        $this->originalDeckPosition = $originalDeckPosition;
    }

}