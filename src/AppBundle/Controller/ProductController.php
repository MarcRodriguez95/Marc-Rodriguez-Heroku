<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 25/11/2016
 * Time: 15:54
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ProductType;
class ProductController extends Controller
{
    /**
     * @Route("/", name="app_product_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        $m = $this->getDoctrine()->getManager();


        $repo = $m->getRepository('AppBundle:Product');
        $prod = $repo->findAll();

        return $this->render(':Productos:VistaProducto.html.twig', [
            'prod' => $prod
        ]);

        /*
        $p = new Product();



        $p
            ->setName('Meizu m3')
            ->setDescription('Chino con cierta garantia')
            ->setPrecio('120')
        ;



        $p = $repo->find(1);



        $p = $repo->findOneBy(
            array('id' => $productos
            ));



        $p = $repo->find(1);
        $p->setPrecio('200');


        $e1 = $repo->findOneBy([
                'name' => 'BQ'

        ]
        );
        $m->persist($p);
        $m->flush();
*/
    }



    /**
     * @Route("/insert", name="app_product_insertar")
     */
    public function insertarAction()
    {
        $prod = new Product();
        $form = $this->createForm(ProductType::class, $prod);
        return $this->render(':Productos:FormVista.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_product_doinsertar')
            ]
        );

    }
    /**
     * @Route("/doinsert", name="app_product_doinsertar")
     */
    public function doInsertarAction(Request $request)
    {
        $prod = new Product();
        $form = $this->createForm(ProductType::class, $prod);

        $form->handleRequest($request);

        if ($form->isValid()){
            $x = $this->getDoctrine()->getManager();
            $x->persist($prod);
            $x->flush();

            $this->addFlash('mensaje', 'Producto añadido');

            return $this->redirectToRoute('app_product_index');
        }

        $this->addFlash('mensaje', 'datos del formulario');

        return $this->render(':Productos:FormVista.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_product_doinsertar')
            ]
        );

    }

    /**
     * @Route("/update/{id}", name="app_product_update")
     */
    public function updateAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repo = $m->getRepository('AppBundle:Product');
        $prod = $repo->find($id);

        $form = $this->createForm(ProductType::class, $prod);


        return $this->render(':Productos:FormVista.html.twig',
            [
                'form'      =>  $form->createView(),
                'action'    =>  $this->generateUrl('app_product_doupdate', ['id' => $id])
            ]
        );


    }

    /**
     * @Route("/doupdate/{id}", name="app_product_doupdate")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function doUpdateAction($id, Request $request)
    {
        $m          = $this->getDoctrine()->getManager();
        $repo       = $m->getRepository('AppBundle:Product');
        $prod       = $repo->find($id);
        $form       = $this->createForm(ProductType::class, $prod);

        $form->handleRequest($request);

        if($form->isValid())
        {
            $m->flush();
            $this->addFlash('Mensaje', 'Producto actualizado');

            return $this->redirectToRoute('app_product_index');
        }

        $this->addFlash('Mensaje', 'Producto actualizado en el formulario');

        return $this->render(':Productos:FormVista.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_product_doupdate')
            ]

        );


    }


    /**
     * @Route("/remove/{id}", name="app_product_remove")
     */
    public function removeAction(Product $prod)
    {
        $m = $this->getDoctrine()->getManager();
        $m->remove($prod);
        $m->flush();

        $this->addFlash('Mensaje', 'Producto eliminado');

        return $this->redirectToRoute('app_product_index');
    }

}