<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use AppBundle\Entity\PieceOfFurniture;
use AppBundle\Entity\TypeFurniture;
use AppBundle\Form\AddRoomType;
use AppBundle\Form\EstateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @param SessionInterface $session
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, SessionInterface $session)
    {
        // Doctrine
        $em = $this->getDoctrine()->getManager();

        // Display formSelect / Objects / Categories / Room
        $formSelect = $this->createForm(EstateType::class);
        $objects = $em->getRepository(PieceOfFurniture::class)->findAll();
        $categories = $em->getRepository(TypeFurniture::class)->findAll();
        $listRooms = $em->getRepository(Room::class)->findAll();

        $formCheckBox = $this->createForm(AddRoomType::class);
        $formCheckBox->handleRequest($request);


        $this->get('session')->set('tabRooms', null);



        // List "tabRooms" (SESSION['tabRooms'])
        if (empty($session->get('tabRooms'))) {
            $this->get('session')->set('tabRooms', null);
            $session->set('tabRooms', array());
        }

        // Add Room
        if (!empty($request->query->get('addRoom'))) {

            // Salle par salle
            foreach ($request->query->get('addRoom') as $value) {

                $room[] = $value;
                $tabRooms = $session->get('tabRooms');

                // S'il n'existe pas déja
                if (!in_array($tabRooms, $room)) {

                    // Rajouter la salle
                    $session->set('tabRooms', array_merge($room, $tabRooms));
                    unset ($room);
                }

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
                'formCheckbox' => $formCheckBox->createView(),
                'rooms' => $listRooms,
                'onglets' => $session->get('tabRooms'),
                'userTags' => $session->get('userTag'),
                'objects' => $objects,
                'categories' => $categories,
            )
        );
    }
}
