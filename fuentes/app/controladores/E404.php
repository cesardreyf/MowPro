<?php

namespace Controlador;

use Interfaz\Controlador\IControlador;

class E404 extends IControlador
{

    public function indice(): int
    {
        echo 'La pagina web solicitada no existe';
        return self::EXITO;
    }

}
