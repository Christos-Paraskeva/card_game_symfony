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
        $message = $this->container->get('app.message_generator');
        $m = $message->generateMessage();

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

        return $this->render('AppBundle:default:welcome.html.twig', array(
            'name' => $name,
        ));
    }

    /**
     * @Route("/end_game", name="end_game")
     */
    public function endGameAction()
    {
        $session = $this->container->get('session');
        $session->remove('currentPlayers');

        return $this->redirect($this->generateUrl('welcome'));
    }

}
