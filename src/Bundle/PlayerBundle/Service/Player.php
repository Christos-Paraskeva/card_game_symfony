<?php

namespace Bundle\PlayerBundle\Service;

use Bundle\PlayerBundle\Entity\PlayerEntity;


class Player {

    public function __construct ($name = null, $id = null) {
        $this->name = $name;
        $this->id = $id;
        $this->cardsHeld = [];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function showCards()
    {
        return $this->cardsHeld;
    }

    public function createPlayer ($name, $id)
    {
        return new Player($name, $id);
    }

//    public function getDoctrineService($doctrineService)
//    {
//        $this->em = $doctrineService;
//    }

    public function savePlayer($entityManager)
    {
        $em = $entityManager;
            $playerEntity = new PlayerEntity();
            $playerEntity->setName($this->name);
            // make some changes to database

//        return $playerEntity;
            $em->persist($playerEntity);
            $em->flush();
    }

//    public function loadPlayers()
//    {
////        $em = $playerEntity;
////        return $playerEntity;
//
//        $playerEntity = $this->getDoctrine()
//            ->getRepository('Bundle\PlayerBundle\Entity\PlayerEntity')
//            ->findAll();
//
//        return $playerEntity;
//    }

}