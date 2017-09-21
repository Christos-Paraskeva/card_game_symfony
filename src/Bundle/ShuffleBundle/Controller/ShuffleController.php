<?php

namespace Bundle\ShuffleBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ShuffleController extends Controller
{
    /**
     * @Route("/shuffle", name="shuffle")
     */
    public function shuffleAction(Request $request)
    {
        $shuffleService = $this->container->get('app.shuffle');
        $session =  $this->container->get('session');

        $shuffledDeck = $shuffleService->defaultShuffle($session->get('deckOfCards'));
        $session->set('deckOfCards', $shuffledDeck);
        $session->save();

        return $this->redirect($this->generateUrl('shuffled_deck'));
    }

}
