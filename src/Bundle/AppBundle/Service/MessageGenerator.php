<?php

namespace Bundle\AppBundle\Service;

class MessageGenerator
{
    public function getHappyMessage($extraWord)
    {
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        $index = array_rand($messages);

//        var_dump($extraWord);
        $arrWord = $messages[$index];

        return $arrWord;
    }
}