<?php

namespace Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
//        $logger = $this->container->get('logger');
//        $logger1 = $logger->info('I just used a service');
        $message = $this->container->get('app.message_generator');
        $m = $message->generateMessage();
//        var_dump($m);
        return $this->render('AppBundle::test.html.twig', array(
            'm' => $m,
        ));
    }

    /**
     * @Route("/welcome", name="welcome")
     */
    public function welcomeAction(Request $request)
    {
        $name = $request->request->get('name');

//        $deck = $this->container->get('app.deck_generator');
//        $card = $this->container->get('app.card_generator');
////
//        $x = $deck->createDeck('standard', $card);
//        var_dump($card);
//        var_dump($x);

        return $this->render('AppBundle:default:welcome.html.twig', array(
            'name' => $name,
        ));
    }

}
