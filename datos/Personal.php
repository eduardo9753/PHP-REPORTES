<?php

class Personal
{
    private $idDNI;
    private $foto;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $fecha;
    private $actividad;
    private $profesion;

    private $checkfiebre;
    private $descfiebre;
    private $checkgarganta;
    private $descgarganta;
    private $checkcovid;
    private $desccovid;
    private $checkembarazo;
    private $descembarazo;
    private $checkalergia;
    private $descalergia;


    private $idBrigada;
    private $observacion;
    private $estado;
    private $fechaRegistro;
    private $planilla;
    private $telefono;
    private $estadoDosisUno;
    private $estadoDosisDos;
    private $cartilla; 

    public function __construct()
    {
        $this->idDNI = 0;
        $this->nombre = "";
        $this->foto ="";
        $this->apellidoPaterno  = "";
        $this->apellidoMaterno = "";
        $this->fecha = "";
        $this->actividad = "";
        $this->profesion = "";
        $this->checkfiebre = "";
        $this->descfiebre = "";
        $this->checkgarganta = "";
        $this->descgarganta = "";
        $this->checkcovid = "";
        $this->desccovid = "";
        $this->checkembarazo = "";
        $this->descembarazo = "";
        $this->checkalergia = "";
        $this->descalergia = "";
        $this->idBrigada = "";
        $this->estado = "";
        $this->fechaRegistro ="";
        $this->planilla = "";
        $this->telefono =0;
        $this->estadoDosisUno =0;
        $this->estadoDosisDos =0;
        $this->cartilla ="";
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




    //CHECK DE LAS PREGUNTAS
    function setcheckfiebre($checkfiebre)
    {
        $this->checkfiebre = $checkfiebre;
    }
    function getcheckfiebre()
    {
        return $this->checkfiebre;
    }
    function setcheckdescfiebre($descfiebre)
    {
        $this->descfiebre = $descfiebre;
    }
    function getcheckdescfiebre()
    {
        return $this->descfiebre;
    }

    //-
    function setcheckgarganta($checkgarganta)
    {
        $this->checkgarganta = $checkgarganta;
    }
    function getcheckgarganta()
    {
        return $this->checkgarganta;
    }
    function setcheckdescgarganta($descgarganta)
    {
        $this->descgarganta = $descgarganta;
    }
    function getcheckdescgarganta()
    {
        return $this->descgarganta;
    }

    //-
    function setcheckcovid($checkcovid)
    {
        $this->checkcovid = $checkcovid;
    }
    function getcheckcovid()
    {
        return $this->checkcovid;
    }
    function setcheckdesccovid($desccovid)
    {
        $this->desccovid = $desccovid;
    }
    function getcheckdesccovid()
    {
        return $this->desccovid;
    }


    //-
    function setcheckembarazo($checkembarazo)
    {
        $this->checkembarazo = $checkembarazo;
    }
    function getcheckembarazo()
    {
        return $this->checkembarazo;
    }
    function setcheckdescembarazo($descembarazo)
    {
        $this->descembarazo = $descembarazo;
    }
    function getcheckdescembarazo()
    {
        return $this->descembarazo;
    }


    //-
    function setcheckalergia($checkalergia)
    {
        $this->checkalergia = $checkalergia;
    }
    function getcheckalergia()
    {
        return $this->checkalergia;
    }
    function setcheckdescalergia($descalergia)
    {
        $this->descalergia = $descalergia;
    }
    function getcheckdescalergia()
    {
        return $this->descalergia;
    }
    //***************************************************/




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

    function setfechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    }
    function getfechaRegistro()
    {
        return $this->fechaRegistro;
    }
    

    function setplanilla($planilla)
    {
        $this->planilla = $planilla;
    }
    function getplanilla()
    {
        return $this->planilla;
    }

    function setfoto($foto)
    {
        $this->foto = $foto;
    }
    function getfoto()
    {
        return $this->foto;
    }

    function settelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    function getTelefono()
    {
        return $this->telefono;
    }

    //estadoDosisDos
    function setestadoDosisUno($estadoDosisUno)
    {
        $this->estadoDosisUno = $estadoDosisUno;
    }
    function getestadoDosisUno()
    {
        return $this->estadoDosisUno;
    }
    
    function setestadoDosisDos($estadoDosisDos)
    {
        $this->estadoDosisDos = $estadoDosisDos;
    }
    function getestadoDosisDos()
    {
        return $this->estadoDosisDos;
    }

    //cartilla
    function setcartilla($cartilla)
    {
        $this->cartilla = $cartilla;
    }
    function getcartilla()
    {
        return $this->cartilla;
    }
}
