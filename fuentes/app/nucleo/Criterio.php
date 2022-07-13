<?php

namespace Nucleo;

use Contrato\Controlador\Controlador;

class Criterio
{
    public const ERROR = 0;
    public const EXITO = 1;
    public const CONTINUAR = 2;
    public const NO_RENDERIZAR = 4;

    private $controlador;
    private $estados = 0;

    public function __construct(Controlador $controlador)
    {
        $this->controlador = $controlador;

        $this->iniciar();
        $this->ejecutar();
        $this->finalizar();
        $this->renderizar();
    }

    public function iniciar()
    {
        // Inicializa el controlador
        $this->controlador->iniciar();

        // Llama al preindice y almacena su estado
        $this->estados = $this->controlador->preindice();
    }

    public function ejecutar()
    {
        // Si el estado no marca ERROR llama al indice
        if( $this->estados & self::EXITO ) {
            $this->estados = $this->controlador->indice();
        }
    }

    public function finalizar()
    {
        // Si el estado marca ERROR se llama al método error
        if( $this->estados & self::ERROR ) {
            $this->controlador->error();
        }

        // Si el estado del método 'indice' marca EXITO
        // o ERROR && CONTINUAR se llama al método posindice
        if( $this->estados & self::CONTINUAR || $this->estados & self::EXITO ) {
            $this->estados = $this->controlador->posindice();
        }

        // Finaliza el controlador antes de renderizar
        $this->controlador->finalizar();
    }

    public function renderizar()
    {
        // Si la marca NO_RENDERIZAR esta desactivada renderiza
        if( ~$this->estados & self::NO_RENDERIZAR ) {
            $this->controlador->renderizar();
        }
    }

}

?>
