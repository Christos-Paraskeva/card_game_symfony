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
        $m = $message->getHappyMessage('hello');
//        var_dump($m);
        return $this->render('default/test.html.twig', array(
            'm' => $m,
        ));
    }

    /**
     * @Route("/welcome", name="welcome")
     */
    public function welcome(Request $request)
    {
        $name = $request->request->get('name');

        return $this->render('default/welcome.html.twig', array(
            'name' => $name,
        ));
    }
}
