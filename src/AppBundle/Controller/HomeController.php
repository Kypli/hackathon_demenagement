<?php

namespace AppBundle\Controller;

use AppBundle\Form\EstateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, SessionInterface $session)
    {
        // Doctrine
        $em = $this->getDoctrine()->getManager();

        // Display form
        $form = $this->createForm(EstateType::class);

        // Display Tag
        $tags = range(0, 50);

        // Display Rooms
        $rooms = $em->getRepository('AppBundle:Room')
            ->findAll();

        // Sessions initialize
        if (empty($session->get('onglets'))) {
            $session->set('onglets', '');
        }

        // Sessions Reset
        if (!empty($_POST['reset'])) {
            $session->set('onglets', '');
        }

        // Fausses session de test
        if (!empty($_POST['room'])) {
            $add = $session->get('onglets');
            $add[] = $_POST['room'];
            $session->set('onglets', $add);
        }

        return $this->render('default/index.html.twig',
            array(
                'form' => $form->createView(),
                'tags' => $tags,
                'onglets' => $session->get('onglets'),
                'rooms' => $rooms,
            )
        );
    }
}
