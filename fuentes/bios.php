<?php

    // Configuracion
    require 'config.php';

    // Inicializa Mow
    require $mow_carpeta_principal . '/Gestor/Autoload/Autoload.php';
    new Mow\Gestor\Autoload\Autoload();

    // Instancia el gestor de errores
    $gGuardarErrores = new Mow\Datos\Sistema\Errores\Guardar\GuardarTexto(new Mow\Datos\Archivos\Archivo($gestor_errores_archivo));
    $gImprimirErrores = new Mow\Datos\Sistema\Errores\Imprimir\ImprimirTexto();
    $gError = new Mow\Gestor\Sistema\Errores\Errores($gGuardarErrores, $gImprimirErrores);

    // Instancia el gestor de excepciones
    $gGuardarExcepciones = new Mow\Datos\Sistema\Excepciones\Guardar\GuardarTexto(new Mow\Datos\Archivos\Archivo($gestor_excepciones_archivo));
    $gImprimirExcepciones = new Mow\Datos\Sistema\Excepciones\Imprimir\ImprimirTexto();
    $gExcepciones = new Mow\Gestor\Sistema\Excepciones\Excepciones($gGuardarExcepciones, $gImprimirExcepciones);

?>
