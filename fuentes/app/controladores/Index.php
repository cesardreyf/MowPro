<?php

namespace Controlador;

use Interfaz\Controlador\IControlador;

class Index extends IControlador
{

    public function indice(): int
    {
        echo 'Hola mundo';
        return self::EXITO;
    }

}
