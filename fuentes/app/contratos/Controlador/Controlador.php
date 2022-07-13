<?php

namespace Contrato\Controlador;

interface Controlador
{
    public function iniciar();

    public function preindice(): int;
    public function indice()   : int;
    public function posindice(): int;

    public function error();

    public function finalizar();
    public function renderizar();
}

?>
