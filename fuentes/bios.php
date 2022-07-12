<?php

    // Configuracion
    require 'config.php';

    // Inicializa Mow
    require $mow_carpeta_principal . '/Gestor/Autoload/Autoload.php';
    new Mow\Gestor\Autoload\Autoload();

    // Instancia el gestor de errores
    $gErroresConfig = new Mow\Datos\Memoria\MemoriaSoloLectura('gestor_errores_config', $gestor_errores_config_array);
    $gErroresGuardar = new Mow\Datos\Sistema\Errores\Guardar\GuardarTexto(new Mow\Datos\Archivos\Archivo($gestor_errores_archivo));
    $gErroresImprimir = new Mow\Datos\Sistema\Errores\Imprimir\ImprimirTexto();
    $gErrores = new Mow\Gestor\Sistema\Errores\Errores($gErroresConfig, $gErroresGuardar, $gErroresImprimir);

    // Instancia el gestor de excepciones
    $gExcepcionesConfig = new Mow\Datos\Memoria\MemoriaSoloLectura('gestor_excepciones_config', $gestor_excepciones_config_array);
    $gExcepcionesGuardar = new Mow\Datos\Sistema\Excepciones\Guardar\GuardarTexto(new Mow\Datos\Archivos\Archivo($gestor_excepciones_archivo));
    $gExcepcionesImprimir = new Mow\Datos\Sistema\Excepciones\Imprimir\ImprimirTexto();
    $gExcepciones = new Mow\Gestor\Sistema\Excepciones\Excepciones($gExcepcionesConfig, $gExcepcionesGuardar, $gExcepcionesImprimir);

    // Instancia el invocador
    $gInvocador = new Mow\Gestor\Invocador\Invocador();
    $gInvocador->reservarNamespace('App', new Mow\Datos\Archivos\Carpeta($app_carpeta_principal));

    // Crea una memoria de solo lectura
    $memoria_principal = new Mow\Datos\Memoria\MemoriaSoloLectura(
        'memoria_principal',
        array(
            'gestor_errores'        => &$gErrores,
            'gestor_excepciones'    => &$gExcepciones,
            'gestor_invocador'      => &$gInvocador,
            'app_carpeta_principal' => &$app_carpeta_principal
        )
    );

    // Cede el poder a la aplicación
    $aplicacion = new App\Iniciar($memoria_principal);
    $aplicacion->ejecutar();

?>
