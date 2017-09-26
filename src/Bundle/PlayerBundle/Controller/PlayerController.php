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
        $player->savePlayers();

        $em->persist($player);
        $em->flush();
//        $player->getDoctrineService($em);
//        $player->savePlayers($player->name);

        array_push($currentPlayers, $player);

        $session->set('currentPlayers', $currentPlayers);
        $session->save();

        return $this->render('PlayerBundle::player.html.twig', array(
            'currentPlayers' => $currentPlayers,
        ));
    }

    /**
     * @Route("/save_player", name="save_player")
     */
//    public function savePlayerAction(Request $request)
//    {
//
//        $playerService = $this->container->get('app.player');
//        $currentPlayersSession = $this->get('session')->get('currentPlayers');
//
//        delegate database work to player service
//    }

    /**
     * @Route("/load_player", name="load_player")
     */
    public function loadPlayerAction(Request $request)
    {
        $player = $this->getDoctrine()
            ->getRepository('Bundle\PlayerBundle\Entity\PlayerEntity')
            ->findAll();
            // find($id);

        $currentPlayers = $player;

        return $this->render('PlayerBundle::load_player.html.twig', array(
            'currentPlayers' => $currentPlayers,
        ));
    }
}
