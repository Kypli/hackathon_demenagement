<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PieceOfFurniture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pieceoffurniture controller.
 *
 * @Route("pieceoffurniture")
 */
class PieceOfFurnitureController extends Controller
{
    /**
     * Lists all pieceOfFurniture entities.
     *
     * @Route("/", name="pieceoffurniture_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pieceOfFurnitures = $em->getRepository('AppBundle:PieceOfFurniture')->findAll();

        return $this->render('pieceoffurniture/index.html.twig', array(
            'pieceOfFurnitures' => $pieceOfFurnitures,
        ));
    }

    /**
     * Creates a new pieceOfFurniture entity.
     *
     * @Route("/new", name="pieceoffurniture_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pieceOfFurniture = new Pieceoffurniture();
        $form = $this->createForm('AppBundle\Form\PieceOfFurnitureType', $pieceOfFurniture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pieceOfFurniture);
            $em->flush();

            return $this->redirectToRoute('pieceoffurniture_show', array('id' => $pieceOfFurniture->getId()));
        }

        return $this->render('pieceoffurniture/new.html.twig', array(
            'pieceOfFurniture' => $pieceOfFurniture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pieceOfFurniture entity.
     *
     * @Route("/{id}", name="pieceoffurniture_show")
     * @Method("GET")
     */
    public function showAction(PieceOfFurniture $pieceOfFurniture)
    {
        $deleteForm = $this->createDeleteForm($pieceOfFurniture);

        return $this->render('pieceoffurniture/show.html.twig', array(
            'pieceOfFurniture' => $pieceOfFurniture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pieceOfFurniture entity.
     *
     * @Route("/{id}/edit", name="pieceoffurniture_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PieceOfFurniture $pieceOfFurniture)
    {
        $deleteForm = $this->createDeleteForm($pieceOfFurniture);
        $editForm = $this->createForm('AppBundle\Form\PieceOfFurnitureType', $pieceOfFurniture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pieceoffurniture_edit', array('id' => $pieceOfFurniture->getId()));
        }

        return $this->render('pieceoffurniture/edit.html.twig', array(
            'pieceOfFurniture' => $pieceOfFurniture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pieceOfFurniture entity.
     *
     * @Route("/{id}", name="pieceoffurniture_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PieceOfFurniture $pieceOfFurniture)
    {
        $form = $this->createDeleteForm($pieceOfFurniture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pieceOfFurniture);
            $em->flush();
        }

        return $this->redirectToRoute('pieceoffurniture_index');
    }

    /**
     * Creates a form to delete a pieceOfFurniture entity.
     *
     * @param PieceOfFurniture $pieceOfFurniture The pieceOfFurniture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PieceOfFurniture $pieceOfFurniture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pieceoffurniture_delete', array('id' => $pieceOfFurniture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
