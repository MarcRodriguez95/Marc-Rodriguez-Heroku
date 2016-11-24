<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 28/10/2016
 * Time: 17:27
 */

namespace AppBundle\Service;


class Calculadora
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

    public function __construct($op1 = null, $op2 = null, $resultado = null)
    {
        $this->setOp1($op1);
        $this->setOp2($op2);
        $this->setResultado($resultado);
    }

    /**
     * @param int $op1
     */
    public function setOp1($op1)
    {
        $this->op1 = $op1;
        return $this;
    }

    /**
     * @return int
     */
    public function getOp1()
    {
        return $this->op1;
    }

    /**
     * @param int $op2
     */
    public function setOp2($op2)
    {
        $this->op2 = $op2;
        return $this;
    }

    /**
     * @return int
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
        return $this;
    }

    /**
     * @return int
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    public function sumar()
    {
        $this->setResultado($this->getOp1() + $this->getOp2());

    }

    public function restar()
    {
        $this->setResultado($this->getOp1() - $this->getOp2());

    }

    public function multiplicar()
    {
        $this->setResultado($this->getOp1() * $this->getOp2());

    }

    public function dividir()
    {
        $this->setResultado($this->getOp1() / $this->getOp2());

    }


    public function __toString()
    {
        return "El resultado es = " . $this->getResultado();
    }

}