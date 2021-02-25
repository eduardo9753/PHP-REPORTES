<?php

class Personal
{
    private $idDNI;
    private $nombre;
    private $apellidoPaterno;

    private $apellidoMaterno;
    private $fecha;
    private $actividad;
    private $profesion;

    private $checkCovid;
    private $checkDiris;

    private $checkVacuna;
    private $idBrigada;
    private $observacion;
    private $estado;

    public function __construct()
    {
        $this->idDNI = 0;
        $this->nombre = "";
        $this->apellidoPaterno  = "";
        $this->apellidoMaterno = "";
        $this->fecha = "";
        $this->actividad = 0;
        $this->profesion = "";
        $this->checkCovid  = "";
        $this->checkDiris = "";
        $this->checkVacuna = "";
        $this->idBrigada = "";
        $this->estado = "";
    }

    function setidDNI($idDNI)
    {
        $this->idDNI = $idDNI;
    }
    function getidDNI()
    {
        return $this->idDNI;
    }



    function setnombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function getnombre()
    {
        return $this->nombre;
    }

    function setapellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;
    }
    function getapellidoPaterno()
    {
        return $this->apellidoPaterno;
    }

    function setapellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;
    }
    function getapellidoMaterno()
    {
        return $this->apellidoMaterno;
    }



    function setfecha($fecha)
    {
        $this->fecha = $fecha;
    }
    function getfecha()
    {
        return $this->fecha;
    }


    function setactividad($actividad)
    {
        $this->actividad = $actividad;
    }
    function getactividad()
    {
        return $this->actividad;
    }


    function setprofesion($profesion)
    {
        $this->profesion = $profesion;
    }
    function getprofesion()
    {
        return $this->profesion;
    }


    function setcheckCovid($checkCovid)
    {
        $this->checkCovid = $checkCovid;
    }
    function getcheckCovid()
    {
        return $this->checkCovid;
    }


    function setcheckDiris($checkDiris)
    {
        $this->checkDiris = $checkDiris;
    }
    function getcheckDiris()
    {
        return $this->checkDiris;
    }


    function setcheckVacuna($checkVacuna)
    {
        $this->checkVacuna = $checkVacuna;
    }
    function getcheckVacuna()
    {
        return $this->checkVacuna;
    }
    

    function setidBrigada($idBrigada)
    {
        $this->idBrigada = $idBrigada;
    }
    function getidBrigada()
    {
        return $this->idBrigada;
    }

    
    function setobservacion($observacion)
    {
        $this->observacion = $observacion;
    }
    function getobservacion()
    {
        return $this->observacion;
    }

    function setestado($estado)
    {
        $this->estado = $estado;
    }
    function getestado()
    {
        return $this->estado;
    }
}
