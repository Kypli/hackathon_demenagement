<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PieceOfFurniture;
use AppBundle\Entity\TypeFurniture;
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

        // Initialise GET
        if (!empty($request->query->get('room'))) {
            $room = $request->query->get('room');
        }

        // Display formSelect
        $formSelect = $this->createForm(EstateType::class);

        // Display Objects / Categories / Room
        $objects = $em->getRepository(PieceOfFurniture::class)->findAll();
        $categories = $em->getRepository(TypeFurniture::class)->findAll();
        $rooms = $em->getRepository('AppBundle:Room')->findAll();

        // Sessions initialize
        if (empty($session->get('onglets'))) {
            $session->set('onglets', '');
        }

        // Création SESSION['room']
        if (!empty($room)) {

            // Forcer $add en tableau
            if (!empty($session->get('onglets'))) {
                $add = $session->get('onglets');
            } else {
                $add = [];
            }

            // S'il n'existe pas déja
            if (!in_array($room, $add)) {

                // Rajouter la salle
                $add[] = $room;
                $session->set('onglets', $add);
            }
        }

        // Création SESSION['tags']
        $tag = [
            'salle' => 'cuisine',
            'id' => 1,
            'name' => 1,
        ];
        $listTag = [];
        $listTag[] = $tag;
        $session->set('userTag', $listTag);

        // Sessions Reset
        if (!empty($_POST['reset'])) {
            $session->set('onglets', array());
        }

        return $this->render('default/index.html.twig',
            array(
                'formSelect' => $formSelect->createView(),
                'rooms' => $rooms,
                'onglets' => $session->get('onglets'),
                'userTags' => $session->get('userTag'),
                'objects' => $objects,
                'categories' => $categories,
            )
        );
    }
}
