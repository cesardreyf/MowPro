<?php

namespace Interfaz\Controlador;

use Contrato\Controlador\Controlador;
use Nucleo\Criterio;

abstract class IControlador implements Controlador
{
    const EXITO = Criterio::EXITO;
    const ERROR = Criterio::ERROR;
    const CONTINUAR = Criterio::CONTINUAR;
    const NO_RENDERIZAR = Criterio::NO_RENDERIZAR;

    final public function __construct()
    {
    }

    final public function __destruct()
    {
    }

    final public function iniciar()
    {
    }

    public function preindice(): int
    {
        return self::EXITO;
    }

    abstract public function indice(): int;
    /*{
        return self::EXITO;
    }*/

    public function posindice(): int
    {
        return self::EXITO;
    }

    public function error()
    {
    }

    final public function finalizar()
    {
    }

    /*final*/
    public function renderizar()
    {
    }

}
