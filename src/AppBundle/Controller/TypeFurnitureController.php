<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TypeFurniture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typefurniture controller.
 *
 * @Route("typefurniture")
 */
class TypeFurnitureController extends Controller
{
    /**
     * Lists all typeFurniture entities.
     *
     * @Route("/", name="typefurniture_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeFurnitures = $em->getRepository('AppBundle:TypeFurniture')->findAll();

        return $this->render('typefurniture/index.html.twig', array(
            'typeFurnitures' => $typeFurnitures,
        ));
    }

    /**
     * Creates a new typeFurniture entity.
     *
     * @Route("/new", name="typefurniture_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeFurniture = new Typefurniture();
        $form = $this->createForm('AppBundle\Form\TypeFurnitureType', $typeFurniture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeFurniture);
            $em->flush();

            return $this->redirectToRoute('typefurniture_show', array('id' => $typeFurniture->getId()));
        }

        return $this->render('typefurniture/new.html.twig', array(
            'typeFurniture' => $typeFurniture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeFurniture entity.
     *
     * @Route("/{id}", name="typefurniture_show")
     * @Method("GET")
     */
    public function showAction(TypeFurniture $typeFurniture)
    {
        $deleteForm = $this->createDeleteForm($typeFurniture);

        return $this->render('typefurniture/show.html.twig', array(
            'typeFurniture' => $typeFurniture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeFurniture entity.
     *
     * @Route("/{id}/edit", name="typefurniture_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeFurniture $typeFurniture)
    {
        $deleteForm = $this->createDeleteForm($typeFurniture);
        $editForm = $this->createForm('AppBundle\Form\TypeFurnitureType', $typeFurniture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typefurniture_edit', array('id' => $typeFurniture->getId()));
        }

        return $this->render('typefurniture/edit.html.twig', array(
            'typeFurniture' => $typeFurniture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeFurniture entity.
     *
     * @Route("/{id}", name="typefurniture_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeFurniture $typeFurniture)
    {
        $form = $this->createDeleteForm($typeFurniture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeFurniture);
            $em->flush();
        }

        return $this->redirectToRoute('typefurniture_index');
    }

    /**
     * Creates a form to delete a typeFurniture entity.
     *
     * @param TypeFurniture $typeFurniture The typeFurniture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeFurniture $typeFurniture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typefurniture_delete', array('id' => $typeFurniture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
