<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PieceOfFurniture;
use AppBundle\Entity\TypeFurniture;
use AppBundle\Form\EstateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/furnitures", name="api_furnitures")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $serializer = $this->get('jms_serializer');

        $categories = $request->query->get('categories');

        if (null != $categories) {
            $furnitures = $em->getRepository(PieceOfFurniture::class)->findBy(['typeFurniture' => explode(',', $categories)]);
        } else {
            $furnitures = $em->getRepository(PieceOfFurniture::class)->findAll();
        }

        $encodedFurniture = $serializer->serialize($furnitures, 'json');

        $response = new Response($encodedFurniture);
        $response->headers->set('content-type', 'application/json');

        return $response;
    }
}
