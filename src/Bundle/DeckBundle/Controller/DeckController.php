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
        $session =  $this->container->get('session');

        $deck->createDeck('standard');
        $deckOfCards = $deck->cards;

        $session->set('deckOfCards', $deckOfCards);
        $session->save();

        return $this->render('DeckBundle::deck.html.twig', array(
            'deckOfCards' => $deckOfCards,
        ));
    }

    /**
     * @Route("/shuffled_deck", name="shuffled_deck")
     */
    public function deckShuffledAction(Request $request)
    {
        $session =  $this->container->get('session');
        $deckOfCards = $session->get('deckOfCards');

        return $this->render('DeckBundle::deck.html.twig', array(
            'deckOfCards' => $deckOfCards,
        ));
    }

}
