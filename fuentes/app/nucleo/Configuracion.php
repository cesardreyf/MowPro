<?php

namespace Nucleo;

class Configuracion
{
    const CODIFICACION = 'UTF-8';

    public function iniciar()
    {
        mb_internal_encoding(self::CODIFICACION);
        mb_http_output(self::CODIFICACION);
        mb_http_input(self::CODIFICACION);
        mb_regex_encoding(self::CODIFICACION);
    }

    // public function finalizar()
    // {
    // }

}

?>
