<?php

    // Proyecto
    $proyecto_carpeta_fuentes = __DIR__;
    $proyecto_carpeta_principal = dirname($proyecto_carpeta_fuentes);
    $proyecto_carpeta_registros = $proyecto_carpeta_principal . '/registros';

    // Mow
    $mow_carpeta_principal = '../../mow';

    // App
    $app_carpeta_principal = $proyecto_carpeta_fuentes . '/app';

    // Gestor Errores
    $gestor_errores_archivo = $proyecto_carpeta_registros . '/errores.log';
    $gestor_errores_config_array = array(
        'guardar' => true,
        'imprimir' => true
    );

    // Gestor Excepciones
    $gestor_excepciones_archivo = $proyecto_carpeta_registros . '/excepciones.log';
    $gestor_excepciones_config_array = array(
        'guardar' => true,
        'imprimir' => true
    );
