<?php

namespace Bundle\PlayerBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session;


class PlayerController extends Controller
{
    /**
     * @Route("/player", name="player")
     */
    public function playerAction(Request $request)
    {

        $playerService = $this->container->get('app.player');
//        $dealerService = $this->container->get('app.dealer');

//        $currentPlayers = $dealerService->currentPlayers;
        $currentPlayersSession =  $this->container->get('session');

//        var_dump($currentPlayersSession);

        if ($currentPlayersSession->get('currentPlayers') == null) {
            $currentPlayers = [];
//            var_dump('here1');
//            var_dump($currentPlayers);

        } else {
//            var_dump('here2');

            $currentPlayers = $currentPlayersSession->get('currentPlayers');
        }


        if (empty($currentPlayers)) {
            $newPlayerId = 1;
        } else {
//            var_dump((end($currentPlayers)->id));
            $newPlayerId = (end($currentPlayers)->id) + 1;
        }

        $playerName = $request->request->get('player_name');



        $player = $playerService->createPlayer($playerName, $newPlayerId);

        array_push($currentPlayers, $player);



        $currentPlayersSession->set('currentPlayers', $currentPlayers);
        $currentPlayersSession->save();

//        $currentPlayersSession->remove('currentPlayers');


//        var_dump($currentPlayers);
//        $playerService->updateCurrentPlayersList($player);
//
//        $dealerService->includeNewPlayer($player);
//        $dealerService->includeNewPlayer($player);
//        var_dump($currentPlayers);
//        $newPlayerId = $newPlayer->getId();
//        $newPlayerName = $newPlayer->getName();

//        $playerName = $request->request->get('player_name');

//        var_dump($newPlayerId);
//        var_dump($dealerService);

        return $this->render('PlayerBundle::player.html.twig', array(
            'currentPlayers' => $currentPlayers,
        ));
    }

}
