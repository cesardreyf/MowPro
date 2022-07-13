<?php

namespace Nucleo;

class EjecutarControlador
{
    private $configuracion;

    public function __construct(object $controlador)
    {
        // Configuracion básica... a implementar
        $this->configuracion = new Configuracion();
        $this->configuracion->iniciar();

        // Ejecuta el controlador segun el criterio
        new Criterio($controlador);
    }

    public function __destruct()
    {
        // $this->configuracion->finalizar();
    }

}

?>
