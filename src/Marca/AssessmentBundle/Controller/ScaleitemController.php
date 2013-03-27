<?php

namespace Marca\AssessmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Marca\AssessmentBundle\Entity\Scaleitem;
use Marca\AssessmentBundle\Form\ScaleitemType;

/**
 * Scaleitem controller.
 *
 * @Route("/scaleitem")
 */
class ScaleitemController extends Controller
{
    /**
     * Lists all Scaleitem entities.
     *
     * @Route("/", name="scaleitem")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $scaleitems = $em->getRepository('MarcaAssessmentBundle:Scaleitem')->findAll();

        return array('scaleitems' => $scaleitems);
    }

    /**
     * Finds and displays a Scaleitem entity.
     *
     * @Route("/{id}/show", name="scaleitem_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $scaleitem = $em->getRepository('MarcaAssessmentBundle:Scaleitem')->find($id);

        if (!$scaleitem) {
            throw $this->createNotFoundException('Unable to find Scaleitem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'scaleitem'      => $scaleitem,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Scaleitem entity.
     *
     * @Route("/new", name="scaleitem_new")
     * @Template()
     */
    public function newAction()
    {
        $scaleitem = new Scaleitem();
        $form   = $this->createForm(new ScaleitemType(), $scaleitem);

        return array(
            'scaleitem' => $scaleitem,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Scaleitem entity.
     *
     * @Route("/create", name="scaleitem_create")
     * @Method("post")
     * @Template("MarcaAssessmentBundle:Scaleitem:new.html.twig")
     */
    public function createAction()
    {
        $scaleitem  = new Scaleitem();
        $request = $this->getRequest();
        $form    = $this->createForm(new ScaleitemType(), $scaleitem);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($scaleitem);
            $em->flush();

            return $this->redirect($this->generateUrl('scaleitem_show', array('id' => $scaleitem->getId())));
            
        }

        return array(
            'scaleitem' => $scaleitem,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Scaleitem entity.
     *
     * @Route("/{id}/edit", name="scaleitem_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $scaleitem = $em->getRepository('MarcaAssessmentBundle:Scaleitem')->find($id);

        if (!$scaleitem) {
            throw $this->createNotFoundException('Unable to find Scaleitem entity.');
        }

        $editForm = $this->createForm(new ScaleitemType(), $scaleitem);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'scaleitem'      => $scaleitem,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Scaleitem entity.
     *
     * @Route("/{id}/update", name="scaleitem_update")
     * @Method("post")
     * @Template("MarcaAssessmentBundle:Scaleitem:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $scaleitem = $em->getRepository('MarcaAssessmentBundle:Scaleitem')->find($id);

        if (!$scaleitem) {
            throw $this->createNotFoundException('Unable to find Scaleitem entity.');
        }

        $editForm   = $this->createForm(new ScaleitemType(), $scaleitem);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($scaleitem);
            $em->flush();

            return $this->redirect($this->generateUrl('scaleitem_edit', array('id' => $id)));
        }

        return array(
            'scaleitem'      => $scaleitem,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Scaleitem entity.
     *
     * @Route("/{id}/delete", name="scaleitem_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $scaleitem = $em->getRepository('MarcaAssessmentBundle:Scaleitem')->find($id);

            if (!$scaleitem) {
                throw $this->createNotFoundException('Unable to find Scaleitem entity.');
            }

            $em->remove($scaleitem);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('scaleitem'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
