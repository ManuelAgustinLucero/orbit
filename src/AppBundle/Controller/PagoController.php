<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pago;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pago controller.
 *
 * @Route("admin/pago")
 */
class PagoController extends Controller
{
    /**
     * Lists all pago entities.
     *
     * @Route("/", name="admin_pago_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pagos = $em->getRepository('AppBundle:Pago')->findAll();

        return $this->render('pago/index.html.twig', array(
            'pagos' => $pagos,
        ));
    }

    /**
     * Creates a new pago entity.
     *
     * @Route("/new", name="admin_pago_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pago = new Pago();
        $form = $this->createForm('AppBundle\Form\PagoType', $pago);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $clientes= $em->getRepository('AppBundle:Cliente')->findAll();


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pago);
            $em->flush();
            if ($pago->getTipoPago()->getId()==3){
                $proyecto = $em->getRepository('AppBundle:Proyecto')->find($pago->getProyecto()->getId());
                $proyecto->setEntregado($proyecto->getEntregado()+$pago->getIngreso());
                if (($proyecto->getEntregado()) >= $proyecto->getTotal()){
                    $proyecto->setEstado(true);
                }
                $em->persist($proyecto);
                $em->flush();
            }


            return $this->redirectToRoute('admin_pago_show', array('id' => $pago->getId()));
        }

        return $this->render('pago/new.html.twig', array(
            'pago' => $pago,
            'form' => $form->createView(),
            'clientes'=>$clientes
        ));
    }

    /**
     * Finds and displays a pago entity.
     *
     * @Route("/{id}", name="admin_pago_show")
     * @Method("GET")
     */
    public function showAction(Pago $pago)
    {
        $deleteForm = $this->createDeleteForm($pago);

        return $this->render('pago/show.html.twig', array(
            'pago' => $pago,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pago entity.
     *
     * @Route("/{id}/edit", name="admin_pago_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pago $pago)
    {
        $deleteForm = $this->createDeleteForm($pago);
        $editForm = $this->createForm('AppBundle\Form\PagoType', $pago);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_pago_edit', array('id' => $pago->getId()));
        }

        return $this->render('pago/edit.html.twig', array(
            'pago' => $pago,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pago entity.
     *
     * @Route("/{id}", name="admin_pago_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pago $pago)
    {
        $form = $this->createDeleteForm($pago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pago);
            $em->flush();
        }

        return $this->redirectToRoute('admin_pago_index');
    }

    /**
     * Creates a form to delete a pago entity.
     *
     * @param Pago $pago The pago entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pago $pago)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_pago_delete', array('id' => $pago->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
