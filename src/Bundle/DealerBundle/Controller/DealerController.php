<?php

namespace Bundle\DealerBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Bundle\PlayerBundle\Entity\PlayerEntity;
use Bundle\DeckBundle\Entity\DeckEntity;

class DealerController extends Controller
{
    /**
     * @Route("/deal_cards", name="deal_cards")
     */
    public function dealCardsAction(Request $request)
    {
        $dealerService = $this->container->get('app.dealer');
        $deckOfCards = $this->get('session')->get('deckOfCards');
        $currentPlayers = $this->get('session')->get('currentPlayers');

        $amountOfCards = $request->request->get('amount_of_cards');

        $dealerService->dealTheCards($amountOfCards, $currentPlayers, $deckOfCards);
        var_dump($currentPlayers[0]->cardsHeld[0][0]->name);

        $em = $this->getDoctrine()->getManager();

//        $currentPlayers[0]->cardsHeld = $currentPlayers->toArray();
//        foreach($currentPlayers->getIterator() as $i => $item) {
        var_dump('1');

        $deckEntity = new DeckEntity();
        var_dump('2');

        $deckEntity->setValue($currentPlayers[0]->cardsHeld[0][0]->value);
        var_dump('3');

        $deckEntity->setName($currentPlayers[0]->cardsHeld[0][0]->name);
        var_dump('4');

        $deckEntity->setSuit($currentPlayers[0]->cardsHeld[0][0]->suit);
        var_dump('5');

        $deckEntity->setOriginalDeckPosition($currentPlayers[0]->cardsHeld[0][0]->originalDeckPosition);
        var_dump('6');

        $em->persist($deckEntity);
        var_dump('7');

        $em->flush();
        var_dump('8');

//        $deckEntity = new DeckEntity();
//        $deckEntity->setValue($currentPlayers[0]->cardsHeld->value);
//        $deckEntity->setName($currentPlayers[0]->cardsHeld->name);
//        $deckEntity->setSuit($currentPlayers[0]->cardsHeld->suit);
//        $deckEntity->setOriginalDeckPosition($currentPlayers[0]->cardsHeld->originalDeckPosition);
//        $em->persist($deckEntity);
//        $em->flush();

//        return $this->redirect($this->generateUrl('player'));
    }

}