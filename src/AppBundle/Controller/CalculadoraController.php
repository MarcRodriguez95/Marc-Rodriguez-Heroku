<?php

namespace AppBundle\Controller;

use AppBundle\Service\Calculadora;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CalculadoraController extends Controller
{

    /**
     * @Route("/", name="app_calculadora_indexprincipal")
     */
    public function principalAction()
    {
        return $this->render(':calculadora:index_principal.html.twig');
    }


    /**
     * @Route("/", name="app_calculadora_index")
     */
    public function indexAction()
    {
        return $this->render(':calculadora:index.html.twig');
    }

    /**
     * @Route("/", name="app_calculadora_indexracional")
     */
    public function indexracionalAction()
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


}
