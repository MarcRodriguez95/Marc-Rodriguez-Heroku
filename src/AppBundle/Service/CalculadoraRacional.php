<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 22/11/2016
 * Time: 19:53
 */

namespace AppBundle\Service;

use AppBundle\Service\Racional;
class CalculadoraRacional
{

    /**
     * @var int
     */
    private $op1;

    /**
     * @var int
     */
    private $op2;
    /**
     * @var int
     */
    private $resultado;


    public function __construct(Racional $r1 = null, Racional $r2 = null)
    {
        $this->setOp1($r1);
        $this->setOp2($r2);
    }

    /**
     * @param int $op1
     */
    public function setOp1(Racional $op1)
    {
        $this->op1 = $op1;
    }

    /**
     * @param int
     */
    public function getOp1()
    {
        return $this->op1;
    }

    /**
     * @param int $op2
     */
    public function setOp2(Racional $op2)
    {
        $this->op2=$op2;
    }

    /**
     * @param int
     */
    public function getOp2()
    {
        return $this->op2;
    }

    /**
     * @param int $resultado
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    /**
     * @param int
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    public function multiplicarRacional()
    {
        $this->setResultado($this->getOp1()->multi($this->getOp2()));

    }

    public function dividirRacional()
    {
        $this->setResultado($this->getOp1()->divi($this->getOp2()));

    }


}