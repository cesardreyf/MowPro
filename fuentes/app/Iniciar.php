<?php

namespace App;

use Mow\Datos\Archivos\Archivo;
use Mow\Datos\Archivos\Carpeta;
use Mow\Datos\Memoria\Cargar\Desde\Archivo\MemoriaSoloLectura;
use Mow\Gestor\Enrutador\Manual\EnrutadorManual as Enrutador;
use Mow\Gestor\Url\Amigable\UrlAmigable;
use Mow\Interfaz\Memoria\MemoriaSoloLectura as MSL;
use Nucleo\EjecutarControlador;

class Iniciar
{
    private $gInvocador;
    private $controlador;

    public function __construct(MSL $memoriaPrincipal)
    {
        $gInvocador = $memoriaPrincipal->obtener('gestor_invocador');
        $appCarpeta = $memoriaPrincipal->obtener('app_carpeta_principal');

        $configCarpetaPrincipal = $appCarpeta . '/configuraciones';
        $appConfig = new MemoriaSoloLectura(new Archivo($configCarpetaPrincipal . '/aplicacion.php'));
        $paginasCfg = new MemoriaSoloLectura(new Archivo($configCarpetaPrincipal . '/paginas.php'));

        $gInvocador->reservarNamespace('Controlador', new Carpeta($appCarpeta . '/controladores'));
        $gInvocador->reservarNamespace('Interfaz', new Carpeta($appCarpeta . '/interfaces'));
        $gInvocador->reservarNamespace('Contrato', new Carpeta($appCarpeta . '/contratos'));
        $gInvocador->reservarNamespace('Modelo', new Carpeta($appCarpeta . '/modelos'));
        $gInvocador->reservarNamespace('Nucleo', new Carpeta($appCarpeta . '/nucleo'));
        $gInvocador->reservarNamespace('', new Carpeta($appCarpeta . '/librerias'));

        $peticion = new UrlAmigable($appConfig);
        $enrutador = new Enrutador($peticion->lista(), $paginasCfg);

        $this->gInvocador =& $gInvocador;
        $this->controlador = $enrutador->clase();
    }

    public function ejecutar()
    {
        // Invoca al controlador
        new EjecutarControlador(
            $this->gInvocador->invocar('Controlador\\' . $this->controlador)
        );
    }

}
