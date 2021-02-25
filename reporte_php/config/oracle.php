<?php

class ConexionOracle
{
    private $conexionBD;
    private $CONTROLADOR;
    private $SERVIDOR;
    private $BASE_DATOS;
    private $PUERTO;
    private $USUARIO;
    private $CLAVE;
    private $CODIFICACION;

    private $configuracion = [
        'drive' => 'mysql',
        'host' => 'localhost',
        'database' => '',
        'port' => '',
        'username' => '',
        'password' => '',
        'charset' => 'utf8mb4'
    ];

    //constructor
    public function __construct()
    {
        $this->CONTROLADOR  = $this->configuracion['drive'];
        $this->SERVIDOR     = $this->configuracion['host'];
        $this->BASE_DATOS   = $this->configuracion['database'];
        $this->PUERTO       = $this->configuracion['port'];
        $this->USUARIO      = $this->configuracion['username'];
        $this->CLAVE        = $this->configuracion['password'];
        $this->CODIFICACION = $this->configuracion['charset'];
    }


    function conectar_Oracle($usuario, $pass, $cadenaConexion)
    {
        // Conectar con Oracle:
        $conexion = oci_connect($usuario, $pass, $cadenaConexion) or die("Error al conectar : " . oci_error());
        return $conexion;
    }
}
