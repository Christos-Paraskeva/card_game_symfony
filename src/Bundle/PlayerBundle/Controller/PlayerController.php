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
        $currentPlayersSession =  $this->container->get('session');

        if ($currentPlayersSession->get('currentPlayers') != null) {
            $currentPlayers = $currentPlayersSession->get('currentPlayers');
            $newPlayerId = (end($currentPlayers)->id) + 1;
        } else {
            $newPlayerId = 1;
            $currentPlayers = [];
        }

        $playerName = $request->request->get('player_name');
        $player = $playerService->createPlayer($playerName, $newPlayerId);

        array_push($currentPlayers, $player);

        $currentPlayersSession->set('currentPlayers', $currentPlayers);
        $currentPlayersSession->save();
//        $currentPlayersSession->remove('currentPlayers');

        return $this->render('PlayerBundle::player.html.twig', array(
            'currentPlayers' => $currentPlayers,
        ));
    }

}
