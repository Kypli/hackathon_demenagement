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

        // Display formSelect / Objects / Categories / Room
        $formSelect = $this->createForm(EstateType::class);
        $objects = $em->getRepository(PieceOfFurniture::class)->findAll();
        $categories = $em->getRepository(TypeFurniture::class)->findAll();
        $listRooms = $em->getRepository('AppBundle:Room')->findAll();

        // List "tabRooms" (SESSION['tabRooms'])
        if (empty($session->get('tabRooms'))) {
            $this->get('session')->set('tabRooms', null);
            $session->set('tabRooms', array());
        }

        // Add Room
        if (!empty($request->query->get('room'))) {
            $room[] = $request->query->get('room');
            $tabRooms = $session->get('tabRooms');

            // S'il n'existe pas déja
            if (!in_array($room, $tabRooms)) {

                // Rajouter la salle
                $session->set('tabRooms', array_merge($room, $tabRooms));
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
        $session->set('userTag', array());

        // Sessions Reset
        if (!empty($_POST['reset'])) {
            $this->get('session')->set('tabRooms', null);
            $session->set('tabRooms', array());
        }

        return $this->render('default/index.html.twig',
            array(
                'formSelect' => $formSelect->createView(),
                'rooms' => $listRooms,
                'onglets' => $session->get('tabRooms'),
                'userTags' => $session->get('userTag'),
                'objects' => $objects,
                'categories' => $categories,
            )
        );
    }
}
