<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 27/01/2017
 * Time: 15:28
 */

namespace AppBundle\Controller;

use AppBundle\Entity\ambd;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ambdType;

class ExamenController extends Controller
{

    /**
     * @Route("/", name="app_ambd_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();


        $repo = $m->getRepository('AppBundle:ambd');
        $aa = $repo->findAll();

        return $this->render(':Examen:VistaAmbd.html.twig', [
            'aa' => $aa
        ]);
    }

    /**
     * @Route("/insertar", name="app_ambd_insertar")
     */

    public function insertarAction()
    {
        $aa = new ambd();
        $form = $this->createForm(ambdType::class, $aa);
        return $this->render(':Examen:FormAmbd.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_ambd_doInsertar')
            ]
        );
    }

    /**
     * @Route("/doinsertar", name="app_ambd_doInsertar")
     *
     */
    public function doInsertarAction(Request $request)
    {
        $aa = new ambd();
        $form = $this->createForm(ambdType::class, $aa);

        $form->handleRequest($request);

        if ($form->isValid()){
            $x = $this->getDoctrine()->getManager();
            $x->persist($aa);
            $x->flush();

            $this->addFlash('mensaje', 'Elemento añadido');

            return $this->redirectToRoute('app_ambd_index');
        }

        $this->addFlash('mensaje', 'Datos del formulario');

        return $this->render(':Examen:FormAmbd.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_ambd_doInsertar')
            ]
        );
    }

    /**
     * @Route("/update/{id}", name="app_ambd_update")
     */

    public function updateAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repo = $m->getRepository('AppBundle:ambd');
        $aaa = $repo->find($id);

        $form = $this->createForm(ambdType::class, $aaa);


        return $this->render(':Examen:FormAmbd.html.twig',
            [
                'form'      =>  $form->createView(),
                'action'    =>  $this->generateUrl('app_ambd_doUpdate', ['id' => $id])
            ]
        );
    }


    /**
     * @Route("/doUpdate/{id}", name="app_ambd_doUpdate")
     * @param Request $request
     */

    public function doUpdateAction($id, Request $request)
    {
        $m          = $this->getDoctrine()->getManager();
        $repo       = $m->getRepository('AppBundle:ambd');
        $aaa       = $repo->find($id);
        $form       = $this->createForm(ambdType::class, $aaa);

        $form->handleRequest($request);

        if($form->isValid())
        {
            $m->flush();
            $this->addFlash('Mensaje', 'Elemento actualizado');

            return $this->redirectToRoute('app_ambd_index');
        }

        $this->addFlash('Mensaje', 'Elemento actualizado en el formulario');

        return $this->render(':Examen:FormAmbd.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_ambd_doUpdate')
            ]

        );
    }

    /**
     * @Route("/remove/{id}", name="app_ambd_remove")
     */

    public function removeAction(ambd $ambd)
    {
        $m = $this->getDoctrine()->getManager();
        $m->remove($ambd);
        $m->flush();

        $this->addFlash('Mensaje', 'Elemento eliminado');

        return $this->redirectToRoute('app_ambd_index');
    }

}