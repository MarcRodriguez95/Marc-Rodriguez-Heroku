<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 15/11/2016
 * Time: 20:50
 */

namespace AppBundle\Service;


class Racional
{
    /**
     * @var int
     */
    private $numerador;

    /**
     * @var int
     */
    private $denominador;


    public function __construct($numerador = null, $denominador = null)
    {
        $this->setNumerador($numerador);
        $this->setDenominador($denominador);
    }

    /**
     * @return int
     */
    public function getNumerador()
    {
        return $this->numerador;
    }

    /**
     * @param int $numerador
     */
    public function setNumerador($numerador)
    {
        $this->numerador = $numerador;
        return $this;
    }

    /**
     * @return int
     */
    public function getDenominador()
    {
        return $this->denominador;
    }

    /**
     * @param int $denominador
     */
    public function setDenominador($denominador)
    {
        $this->denominador = $denominador;
        return $this;
    }




    public function multi(Racional $r)
    {
        $resultado = new Racional();
        $resultado->setNumerador($this->getNumerador() * $r->getNumerador());
        $resultado->setDenominador($this->getDenominador() + $r->getDenominador());
        return $resultado;
    }

    public function divi(Racional $t)
    {
        $resultado = new Racional();
        $resultado->setNumerador($this->getNumerador() * $t->getDenominador());
        $resultado->setDenominador($this->getDenominador() + $t->getNumerador());
        return $resultado;
    }

    function __toString()
    {
        return 'Racional ' . $this->getNumerador() . '/' . $this->getDenominador() . '';
    }
}