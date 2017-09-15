<?php

namespace Bundle\AppBundle\Service;

class MessageGenerator
{
    public function getHappyMessage($extraWord)
    {
        $messages = [
            'This should say something',
            'This should say something better',
        ];

        $index = array_rand($messages);

//        var_dump($extraWord);
        $arrWord = $messages[$index];

        return $arrWord;
    }
}