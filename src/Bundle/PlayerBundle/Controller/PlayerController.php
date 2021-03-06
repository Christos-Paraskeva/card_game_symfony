<?php

namespace Bundle\PlayerBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class PlayerController extends Controller
{
    /**
     * @Route("/player", name="player")
     */
    public function playerAction(Request $request)
    {

        $playerService = $this->container->get('app.player');
        $session = $this->get('session');

        if ($session->get('currentPlayers') != null) {
            $currentPlayers = $session->get('currentPlayers');
            $newPlayerId = (end($currentPlayers)->id) + 1;
        } else {
            $newPlayerId = 1;
            $currentPlayers = [];
        }

        $playerName = $request->request->get('player_name');

        $em = $this->getDoctrine()->getManager();

        $player = $playerService->createPlayer(ucwords($playerName), $newPlayerId);
        $player->savePlayer($em);

        array_push($currentPlayers, $player);

        $session->set('currentPlayers', $currentPlayers);
        $session->save();

        return $this->render('PlayerBundle::player.html.twig', array(
            'currentPlayers' => $currentPlayers,
        ));
    }

    /**
     * @Route("/load_player", name="load_player")
     */
    public function loadPlayerAction(Request $request)
    {
        $currentPlayers = $this->getDoctrine()
            ->getRepository('Bundle\PlayerBundle\Entity\PlayerEntity')
            ->findAll();

        return $this->render('PlayerBundle::load_player.html.twig', array(
            'currentPlayers' => $currentPlayers,
        ));
    }

}
