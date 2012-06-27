<?php

namespace Marca\PortfolioBundle\Controller;

use Marca\HomeBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Marca\PortfolioBundle\Entity\Portfolio;
use Marca\PortfolioBundle\Form\PortfolioType;

/**
 * Portfolio controller.
 *
 * @Route("/portfolio")
 */
class PortfolioController extends Controller
{
    /**
     * Lists all Portfolio entities.
     *
     * @Route("/{courseid}", name="portfolio")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getEm();
        $user = $this->getUser();
        $courseid = $this->get('request')->getSession()->get('courseid');
        $course = $em->getRepository('MarcaCourseBundle:Course')->find($courseid);
        $portset = $course->getPortset();
        $portfolio = $course = $em->getRepository('MarcaPortfolioBundle:Portfolio')->findByUser($user,$course);
        return array('portfolio' =>$portfolio, 'portset' => $portset);
    }
    

    /**
     * Finds and displays a Portfolio entity.
     *
     * @Route("/{courseid}/{id}/show", name="portfolio_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getEm();

        $portfolios = $em->getRepository('MarcaPortfolioBundle:Portfolio')->find($id);

        if (!$portfolio) {
            throw $this->createNotFoundException('Unable to find Portfolio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'portfolios'      => $portfolios,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Adds a new Portfolio entity and redirects to edit for Portitem and Portorder.
     *
     * @Route("/{courseid}/{fileid}/new", name="portfolio_new")
     * @Template()
     */
    public function newAction($courseid, $fileid)
    {
        $em = $this->getEm();
        $user = $this->getUser();
        $course = $this->getCourse();
        $portset = $course->getPortset();
        $file = $em->getRepository('MarcaFileBundle:File')->find($fileid);
        $portitem = $portset->getPortitem()->first();
        $portfolio = new Portfolio();
        $portfolio->setFile($file);
        $portfolio->setUser($user);
        $portfolio->setCourse($course);
        $portfolio->setPortitem($portitem);
        $em->persist($portfolio);
        $em->flush();       
        return $this->redirect($this->generateUrl('portfolio_edit', array('id' => $portfolio->getId(),'courseid' => $courseid)));
    }


    /**
     * Displays a form to edit an existing Portfolio entity.
     *
     * @Route("/{courseid}/{id}/edit", name="portfolio_edit")
     * @Template()
     */
    public function editAction($id,$courseid)
    {
        $em = $this->getEm();
        $options = array('courseid' => $courseid);
        $portfolio = $em->getRepository('MarcaPortfolioBundle:Portfolio')->find($id);

        if (!$portfolio) {
            throw $this->createNotFoundException('Unable to find Portfolio entity.');
        }

        $editForm = $this->createForm(new PortfolioType($options), $portfolio);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'portfolio'      => $portfolio,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Portfolio entity.
     *
     * @Route("/{courseid}/{id}/update", name="portfolio_update")
     * @Method("post")
     * @Template("MarcaPortfolioBundle:Portfolio:edit.html.twig")
     */
    public function updateAction($id,$courseid)
    {
        $em = $this->getEm();
        $options = array('courseid' => $courseid);
        $portfolio = $em->getRepository('MarcaPortfolioBundle:Portfolio')->find($id);

        if (!$portfolio) {
            throw $this->createNotFoundException('Unable to find Portfolio entity.');
        }

        $editForm   = $this->createForm(new PortfolioType($options), $portfolio);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($portfolio);
            $em->flush();

            return $this->redirect($this->generateUrl('portfolio', array('courseid' => $courseid)));
        }

        return array(
            'portfolio'      => $portfolio,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Portfolio entity.
     *
     * @Route("/{courseid}/{id}/delete", name="portfolio_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getEm();
            $portfolio = $em->getRepository('MarcaPortfolioBundle:Portfolio')->find($id);

            if (!$portfolio) {
                throw $this->createNotFoundException('Unable to find Portfolio entity.');
            }

            $em->remove($portfolio);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('portfolio'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
