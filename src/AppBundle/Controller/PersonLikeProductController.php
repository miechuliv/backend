<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\PersonLikeProduct;
use AppBundle\Form\PersonLikeProductType;

/**
 * PersonLikeProduct controller.
 *
 */
class PersonLikeProductController extends Controller
{

    /**
     * Lists all PersonLikeProduct entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:PersonLikeProduct')->findAll();

        return $this->render('AppBundle:PersonLikeProduct:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new PersonLikeProduct entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PersonLikeProduct();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
          
            $em->persist($entity);
            
            $em->flush();

            return $this->redirect($this->generateUrl('personlikeproduct_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:PersonLikeProduct:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a PersonLikeProduct entity.
     *
     * @param PersonLikeProduct $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PersonLikeProduct $entity)
    {
        $form = $this->createForm(new PersonLikeProductType(), $entity, array(
            'action' => $this->generateUrl('personlikeproduct_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PersonLikeProduct entity.
     *
     */
    public function newAction()
    {
        $entity = new PersonLikeProduct();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:PersonLikeProduct:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PersonLikeProduct entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:PersonLikeProduct')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonLikeProduct entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:PersonLikeProduct:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PersonLikeProduct entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:PersonLikeProduct')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonLikeProduct entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:PersonLikeProduct:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a PersonLikeProduct entity.
    *
    * @param PersonLikeProduct $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PersonLikeProduct $entity)
    {
        $form = $this->createForm(new PersonLikeProductType(), $entity, array(
            'action' => $this->generateUrl('personlikeproduct_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PersonLikeProduct entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:PersonLikeProduct')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonLikeProduct entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('personlikeproduct_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:PersonLikeProduct:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a PersonLikeProduct entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:PersonLikeProduct')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PersonLikeProduct entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personlikeproduct'));
    }

    /**
     * Creates a form to delete a PersonLikeProduct entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personlikeproduct_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
