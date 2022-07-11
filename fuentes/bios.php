<?php

    // Configuracion
    require 'config.php';

    // Inicializa Mow
    require $mow_carpeta_principal . '/Gestor/Autoload/Autoload.php';
    new Mow\Gestor\Autoload\Autoload();

    // Instancia el gestor de errores
    $gConfigErrores = new Mow\Datos\Memoria\MemoriaSoloLectura('gestor_errores_config', $gestor_errores_config_array);
    $gGuardarErrores = new Mow\Datos\Sistema\Errores\Guardar\GuardarTexto(new Mow\Datos\Archivos\Archivo($gestor_errores_archivo));
    $gImprimirErrores = new Mow\Datos\Sistema\Errores\Imprimir\ImprimirTexto();
    $gErrores = new Mow\Gestor\Sistema\Errores\Errores($gConfigErrores, $gGuardarErrores, $gImprimirErrores);

    // Instancia el gestor de excepciones
    $gConfigExcepciones = new Mow\Datos\Memoria\MemoriaSoloLectura('gestor_excepciones_config', $gestor_excepciones_config_array);
    $gGuardarExcepciones = new Mow\Datos\Sistema\Excepciones\Guardar\GuardarTexto(new Mow\Datos\Archivos\Archivo($gestor_excepciones_archivo));
    $gImprimirExcepciones = new Mow\Datos\Sistema\Excepciones\Imprimir\ImprimirTexto();
    $gExcepciones = new Mow\Gestor\Sistema\Excepciones\Excepciones($gConfigExcepciones, $gGuardarExcepciones, $gImprimirExcepciones);

    // Instancia el invocador
    $gInvocador = new Mow\Gestor\Invocador\Invocador(new Mow\Datos\Archivos\Carpeta($app_librerias_carpeta));
    $gInvocador->reservarNamespace('App', new Mow\Datos\Archivos\Carpeta($app_carpeta_principal));

?>
