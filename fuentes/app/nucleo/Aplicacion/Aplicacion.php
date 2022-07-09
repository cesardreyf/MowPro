<?php

namespace App;

class Aplicacion
{

    public function __construct()
    {
        echo 'Hola mundo<br>';
    }

    public function __destruct()
    {
        echo 'Adios mundo cruel';
    }

    public function ejecutar()
    {
        echo 'Debería hacer cosas<br>';
    }

}

?>
