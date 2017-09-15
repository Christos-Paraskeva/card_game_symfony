<?php

namespace Bundle\DeckBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeckController extends Controller
{
    /**
     * @Route("/deck", name="deck")
     */
    public function createDeckAction(Request $request)
    {
        $deck = $this->container->get('app.deck_generator');
        $card = $this->container->get('app.card_generator');
//
        $deck->createDeck('standard', $card);
        $deckOfCards = $deck->cards;
        return $this->render('deck/deck.html.twig', array(
            'deckOfCards' => $deckOfCards,
        ));
    }

}
