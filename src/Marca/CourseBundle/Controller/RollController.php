<?php

namespace Marca\CourseBundle\Controller;

use Marca\HomeBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Marca\CourseBundle\roll\Roll;
use Marca\CourseBundle\Form\RollType;

/**
 * Roll controller.
 *
 * @Route("/roll")
 */
class RollController extends Controller
{
    /**
     * Lists all Roll entities.
     *
     * @Route("/", name="roll")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getEm();
        $dql1 = "SELECT p.lastname,p.firstname,r.role,r.status,r.id from MarcaCourseBundle:Roll r JOIN r.profile p ORDER BY p.lastname,p.firstname";
        $rolls = $em->createQuery($dql1)->getResult();

        return array('rolls' => $rolls);
    }

    /**
     * Finds and displays a Roll roll.
     *
     * @Route("/{id}/show", name="roll_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getEm();

        $roll = $em->getRepository('MarcaCourseBundle:Roll')->find($id);

        if (!$roll) {
            throw $this->createNotFoundException('Unable to find Roll roll.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'roll'      => $roll,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Roll roll.
     *
     * @Route("/new", name="roll_new")
     * @Template()
     */
    public function newAction()
    {
        $allowed = array(self::ROLE_INSTRUCTOR);
        $this->restrictAccessTo($allowed);
        
        $roll = new Roll();
        $form   = $this->createForm(new RollType(), $roll);

        return array(
            'roll' => $roll,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Roll roll.
     *
     * @Route("/create", name="roll_create")
     * @Method("post")
     * @Template("MarcaCourseBundle:Roll:new.html.twig")
     */
    public function createAction()
    {
        $allowed = array(self::ROLE_INSTRUCTOR);
        $this->restrictAccessTo($allowed);
        
        $roll  = new Roll();
        $request = $this->getRequest();
        $form    = $this->createForm(new RollType(), $roll);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getEm();
            $em->persist($roll);
            $em->flush();

            return $this->redirect($this->generateUrl('roll_show', array('id' => $roll->getId())));
            
        }

        return array(
            'roll' => $roll,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Roll roll.
     *
     * @Route("/{courseid}/{id}/edit", name="roll_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $allowed = array(self::ROLE_INSTRUCTOR);
        $this->restrictAccessTo($allowed);
        
        $em = $this->getEm();

        $roll = $em->getRepository('MarcaCourseBundle:Roll')->find($id);

        if (!$roll) {
            throw $this->createNotFoundException('Unable to find Roll roll.');
        }

        $editForm = $this->createForm(new RollType(), $roll);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'roll'      => $roll,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Roll roll.
     *
     * @Route("/{courseid}/{id}/update", name="roll_update")
     * @Method("post")
     * @Template("MarcaCourseBundle:Roll:edit.html.twig")
     */
    public function updateAction($id,$courseid)
    {
        $allowed = array(self::ROLE_INSTRUCTOR);
        $this->restrictAccessTo($allowed);
        
        $em = $this->getEm();

        $roll = $em->getRepository('MarcaCourseBundle:Roll')->find($id);

        if (!$roll) {
            throw $this->createNotFoundException('Unable to find Roll roll.');
        }

        $editForm   = $this->createForm(new RollType(), $roll);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($roll);
            $em->flush();

            return $this->redirect($this->generateUrl('course_show', array('courseid' => $courseid)));
        }

        return array(
            'roll'      => $roll,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Roll roll.
     *
     * @Route("/{id}/delete", name="roll_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $allowed = array(self::ROLE_INSTRUCTOR);
        $this->restrictAccessTo($allowed);
        
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getEm();
            $roll = $em->getRepository('MarcaCourseBundle:Roll')->find($id);

            if (!$roll) {
                throw $this->createNotFoundException('Unable to find Roll entity.');
            }

            $em->remove($roll);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('roll'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    /**
     *Approves a pending student 
     * @Route("/{courseid}/{id}/approve_pending" , name="roll_approve")
     *
     */
     public function approveAction($id, $courseid)
     {
         $allowed = array(self::ROLE_INSTRUCTOR);
         $this->restrictAccessTo($allowed);
        
         $em = $this->getEm();
         $roll = $em->getRepository('MarcaCourseBundle:Roll')->find($id);
         //remove pending student role
         $roll->setRole(self::ROLE_STUDENT);
         $em->persist($roll);
         $em->flush();
         return $this->redirect($this->generateUrl('course_show', array('courseid' => $courseid)));
         
     }
     
     /**
     *Approves a pending student 
     * @Route("/{courseid}/approve_all_pending" , name="roll_approve_all")
     *
     */
     public function approveAllAction($courseid)
     {
         $allowed = array(self::ROLE_INSTRUCTOR);
         $this->restrictAccessTo($allowed);
         $em = $this->getEm();
         $course = $this->getCourse();
         foreach($course->getRoll() as $roll){
            if ($roll->getRole() == self::ROLE_PENDING){ 
                $roll->setRole(self::ROLE_STUDENT);
                $em->persist($roll);
                $em->flush();
            }
         }
         return $this->redirect($this->generateUrl('course_show', array('courseid' => $courseid)));
         
     }
    
}
