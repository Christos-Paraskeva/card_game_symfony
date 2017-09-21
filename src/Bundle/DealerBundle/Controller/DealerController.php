<?php

namespace Bundle\DealerBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DealerController extends Controller
{
    /**
     * @Route("/deal_cards", name="deal_cards")
     */
    public function dealCardsAction(Request $request)
    {
        $dealerService = $this->container->get('app.dealer');
        $deckOfCards = $this->get('session')->get('deckOfCards');


//        $shuffleService = $this->container->get('app.shuffle');
//        $session =  $this->container->get('session');
//
//        $shuffledDeck = $shuffleService->defaultShuffle($session->get('deckOfCards'));
//        $session->set('deckOfCards', $shuffledDeck);
//        $session->save();
//
//        return $this->redirect($this->generateUrl('shuffled_deck'));


    }

}