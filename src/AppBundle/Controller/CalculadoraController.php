<?php

namespace AppBundle\Controller;

use AppBundle\Service\Calculadora;
use AppBundle\Service\CalculadoraRacional;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CalculadoraController extends Controller
{



    /**
     * @Route("/", name="app_calculadora_index")
     */
    public function indexAction()
    {
        return $this->render(':calculadora:index.html.twig');
    }




    /**
     * @Route("/sum", name="app_calculadora_sum")
     */
    public function sumAction()
    {
        return $this->render(':calculadora:form.html.twig', [
                'action' => 'app_calculadora_doSum'
    ]);
    }

    /**
     * @Route("/doSum", name="app_calculadora_doSum")
     *
     */
    public function doSumAction(Request $request)
    {
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');

        $calculadora = new Calculadora($op1, $op2);
        $calculadora->sumar();
        $resultado= $calculadora->getResultado();
        return $this->render(':calculadora:result.html.twig',
            [
                'resultado' => $resultado,

                'op1'       => $op1,
                'op2'       => $op2,
                'operacion' => '+'
            ]
        );
    }

    /**
     * @Route("/resta" , name="app_calculadora_resta")
     */
    public function restarAction()
    {
        return $this->render(':calculadora:form.html.twig', [
            'action' => 'app_calculadora_doResta'
        ]);
    }

    /**
     * @Route("/doResta" , name="app_calculadora_doResta")
     */
    public function doRestarAction(Request $request)
    {
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');

        $calculadora = new Calculadora($op1, $op2);
        $calculadora->restar();
        $resultado= $calculadora->getResultado();
        return $this->render(':calculadora:result.html.twig',
            [
                'resultado' => $resultado,

                'op1'       => $op1,
                'op2'       => $op2,
                'operacion' => '-'
            ]
        );
    }

    /**
     * @Route("/mult", name="app_calculadora_mult")
     */
    public function multAction()
    {
        return $this->render(':calculadora:form.html.twig', [
            'action' => 'app_calculadora_doMult'
        ]);
    }

    /**
     * @Route("/doMult", name="app_calculadora_doMult")
     *
     */
    public function doMultAction(Request $request)
    {

        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');

        $calculadora = new Calculadora($op1, $op2);
        $calculadora->multiplicar();
        $resultado= $calculadora->getResultado();
        return $this->render(':calculadora:result.html.twig',
            [
                'resultado' => $resultado,

                'op1'       => $op1,
                'op2'       => $op2,
                'operacion' => '*'
            ]
        );
    }

    /**
     * @Route("/div", name="app_calculadora_div")
     */
    public function divAction()
    {
        return $this->render(':calculadora:form.html.twig', [
            'action' => 'app_calculadora_doDiv'
        ]);
    }

    /**
     * @Route("/doDiv", name="app_calculadora_doDiv")
     *
     */
    public function doDivAction(Request $request)
    {

        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');

        $calculadora = new Calculadora($op1, $op2);
        $calculadora->dividir();
        $resultado= $calculadora->getResultado();
        return $this->render(':calculadora:result.html.twig',
            [
                'resultado' => $resultado,

                'op1'       => $op1,
                'op2'       => $op2,
                'operacion' => '/'
            ]
        );
    }


    /**
     * @Route("/multi", name="app_calculadora_multi")
     */
    public function multiAction()
    {
        return $this->render(':calculadora:formRacional.html.twig', [
            'action' => 'app_calculadora_doMulti'
        ]);
    }

    /**
     * @Route("/doMulti", name="app_calculadora_doMulti")
     *
     */
    public function doMultiAction(Request $request)
    {

        $op1 = $request->request->get('num1');
        $op2 = $request->request->get('num2');

        $op3 = $request->request->get('den1');
        $op4 = $request->request->get('den2');

        $racionales = new CalculadoraRacional($op1, $op2, $op3, $op4);
        $racionales->multiplicarRacional();
        $resultado= $racionales->getResultado();
        return $this->render(':calculadora:result.html.twig',
            [
                'resultado' => $resultado,

                'op1'       => $op1,
                'op2'       => $op2,
                'op3'       => $op3,
                'op4'       => $op4,
                'operacion' => '*'
            ]
        );
    }


    /**
     * @Route("/divi", name="app_calculadora_divi")
     */
    public function diviAction()
    {
        return $this->render(':calculadora:form.html.twig', [
            'action' => 'app_calculadora_doDivi'
        ]);
    }

    /**
     * @Route("/doDivi", name="app_calculadora_doDivi")
     *
     */
    public function doDiviAction(Request $request)
    {

        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');

        $calculadora = new CalculadoraRacional($op1, $op2);
        $calculadora->dividirRacional();
        $resultado= $calculadora->getResultado();
        return $this->render(':calculadora:result.html.twig',
            [
                'resultado' => $resultado,

                'op1'       => $op1,
                'op2'       => $op2,
                'operacion' => '/'
            ]
        );
    }


}
