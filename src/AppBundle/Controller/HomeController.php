<?php

namespace AppBundle\Controller;

use AppBundle\Form\EstateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // Display form
        $form = $this->createForm(EstateType::class);

        // Display Tag
        $tags = range(0, 50);

        return $this->render('default/index.html.twig',
            array(
                'form' => $form->createView(),
                'tags' => $tags,
            )
        );
    }
}
