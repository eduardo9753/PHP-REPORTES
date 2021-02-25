<?php

include_once('model/model.php');
include_once('datos/Personal.php');
include_once('datos/paginacion.php');
require('pdf/fpdf.php');


class Control
{

    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new Modelo();
    }

    public  function index() //VISTA INDEX
    {
        $dataBrigada = $this->MODEL->dataBrigada();
        include_once('view/index.php');
    }

    public function save()   //INSERTAR DATOS DEL PERSONAL
    {
        try {
            if (isset($_REQUEST['btnData'])) {
                $personal = new Personal();
                $personal->setidDNI(strtoupper($_POST['txt_dni']));
                $personal->setnombre(strtoupper($_POST['txt_nombre']));
                $personal->setapellidoPaterno(strtoupper($_POST['txt_apellido_paterno']));
                $personal->setapellidoMaterno(strtoupper($_POST['txt_apellido_materno']));
                $personal->setfecha($_POST['txt_fecha_nacimiento']);
                $personal->setactividad($_POST['txt_actividad']);
                $personal->setprofesion($_POST['cbo_profesion']);
                $personal->setcheckCovid('--');         //$_POST['check_personal_covid']
                $personal->setcheckDiris('--');         //$_POST['check_diris']
                $personal->setcheckVacuna('--');        //$_POST['check_vacuna']
                $personal->setidBrigada($_POST['cboBrigradas']);
                $personal->setobservacion(strtoupper($_POST['txtObservacion']));
                $personal->setestado(0);

                if ($this->MODEL->insertReporte($personal)) {
                    header('Location: index.php?ruta=registros&pagina=1');
                    //include_once('view/registros.php'); //VISTA DE LOS REGISTROS SIN ACTUALIZAR
                } else {
                    header('Location: index.php?ruta=registros&pagina=1');
                    //include_once('view/registros.php'); //VISTA DE LOS REGISTROS SIN ACTUALIZAR
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updatePersonal() //ACTUALIZAR PERSONAL
    {
        try {
            if (isset($_REQUEST['btnUpdate'])) {
                $personal = new Personal();
                $personal->setnombre(strtoupper($_POST['txt_nombre']));
                $personal->setapellidoPaterno(strtoupper($_POST['txt_apellido_paterno']));
                $personal->setapellidoMaterno(strtoupper($_POST['txt_apellido_materno']));
                $personal->setfecha(strtoupper($_POST['txt_fecha_nacimiento']));
                $personal->setactividad(strtoupper($_POST['txt_actividad']));
                $personal->setprofesion(strtoupper($_POST['cbo_profesion']));
                $personal->setcheckCovid(strtoupper($_POST['check_personal_covid']));
                $personal->setcheckDiris(strtoupper($_POST['check_diris']));
                $personal->setcheckVacuna(strtoupper($_POST['check_vacuna']));
                $personal->setidBrigada($_POST['cboBrigradas']);
                $personal->setobservacion(strtoupper($_POST['txtObservacion']));
                $personal->setestado(1);
                $personal->setidDNI($_POST['txt_dni']);

                if ($this->MODEL->actualizarReporte($personal)) {
                    header('Location: index.php?ruta=registrosActualizados&pagina=1');
                } else {
                    header('Location: index.php?ruta=registrosActualizados&pagina=1');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function search()       //VISTA BUSCAR POR DNI
    {
        include_once('view/search.php');
    }


    public function dataPersonal() //PINTANDO DATOS POR EL ID DE CADA PERSONAL
    {
        try {
            if (isset($_REQUEST['btnBuscar'])) {
                if (isset($_REQUEST['txt_dni'])) {
                    $personal = new Personal();
                    $personal->setidDNI($_POST['txt_dni']);
                    $dataPersonal = $this->MODEL->dataPersonal($personal);
                    if ($dataPersonal) {
                        include_once('view/data.php'); //VISTA CON LOS DATOS DEL PERSONAL POR ID INPUT
                    } else {
                        $message = "No se encontro Datos";
                        echo $this->MODEL->error($message);
                        include_once('view/search.php');
                    }
                }
            } else if (isset($_REQUEST['id'])) { //ID DESDE LA TABLA REGISTROS SIN ACTUALIZAR
                $personal = new Personal();
                $personal->setidDNI($_REQUEST['id']);
                $dataPersonal = $this->MODEL->dataPersonal($personal);
                include_once('view/data.php'); //VISTA DE LOS DATOS CARGADOS POR ID(DNI)
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    //VISTA DE LOS REGITROS DEL PERSONAL SIN ACTUALIZAR
    public function registros()
    {
        $datosTotales = intval($this->MODEL->countRegistroPersonal());
        $datos_x_paginas = 17;
        $paginas = ceil($datosTotales / $datos_x_paginas);
        $iniciar = (($_GET['pagina'] - 1) * $datos_x_paginas);
        $paginacion = new Paginacion();
        $paginacion->setiniciar($iniciar);
        $paginacion->setdatos_x_paginas($datos_x_paginas);
        $paginacionData = $this->MODEL->registroPersonal($paginacion); //PARA MI RECORRIDO FOREACH 
        include_once('view/registros.php');
    }

    public function registrosActualizados()
    {
        $datosTotales = intval($this->MODEL->countRegistroPersonalActualizado());
        $datos_x_paginas = 17;
        $paginas = ceil($datosTotales / $datos_x_paginas);
        $iniciar = (($_GET['pagina'] - 1) * $datos_x_paginas);
        $paginacion = new Paginacion();
        $paginacion->setiniciar($iniciar);
        $paginacion->setdatos_x_paginas($datos_x_paginas);
        $paginacionData = $this->MODEL->registroPersonalActualizado($paginacion); //PARA MI RECORRIDO FOREACH  
        include_once('view/registrosActualizados.php');
    }
    //VISTA DE LOS REGITROS DEL PERSONAL ACTUALIZADOS



    public function reporte()     // REPORTE DE PDF
    {
        try {
            if (isset($_REQUEST['id'])) {
                $personal = new Personal();
                $personal->setidDNI($_REQUEST['id']);
                $dataPersonal = $this->MODEL->dataPersonalActualizado($personal);
                include_once('view/reportePDF.php'); //HOJA PDF PARA LOS REPOSTES (fpdf-libreria)
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
