<?php

include_once('model/model.php');
include_once('datos/Personal.php');
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

    public function save() //INSERTAR DATOS DEL PERSONAL
    {
        try {
            if (isset($_REQUEST['btnData'])) {
                $personal = new Personal();
                $personal->setidDNI($_POST['txt_dni']);
                $personal->setnombre($_POST['txt_nombre']);
                $personal->setapellidoPaterno($_POST['txt_apellido_paterno']);
                $personal->setapellidoMaterno($_POST['txt_apellido_materno']);
                $personal->setfecha($_POST['txt_fecha_nacimiento']);
                $personal->setactividad($_POST['txt_actividad']);
                $personal->setprofesion($_POST['cbo_profesion']);
                $personal->setcheckCovid('--');         //$_POST['check_personal_covid']
                $personal->setcheckDiris('--');         //$_POST['check_diris']
                $personal->setcheckVacuna('--');       //$_POST['check_vacuna']
                $personal->setidBrigada($_POST['cboBrigradas']);
                $personal->setobservacion($_POST['txtObservacion']);
                $personal->setestado(0);

                if ($this->MODEL->insertReporte($personal)) {
                    $message = "Se Guardo Correctamente";
                    echo $this->MODEL->success($message);
                    include_once('view/registros.php');
                } else {
                    $message = "No se Guardo Correctamente";
                    echo $this->MODEL->error($message);
                    include_once('view/registros.php');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function search() //VISTA BUSCAR POR DNI
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
                        include_once('view/data.php'); //VISTA CON LOS DATOS DEL PERSONAL POR ID
                    } else {
                        $message = "No se encontro Datos";
                        echo $this->MODEL->error($message);
                        include_once('view/search.php');
                    }
                }
            } else if (isset($_REQUEST['id'])) {
                $personal = new Personal();
                $personal->setidDNI($_REQUEST['id']);
                $dataPersonal = $this->MODEL->dataPersonal($personal);
                include_once('view/data.php'); //VISTA CON LOS DATOS DEL PERSONAL POR ID
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function registros() //VISTA DE LOS REGITROS DEL PERSONAL SIN ACTUALIZAR
    {
        //$dataPersonal = $this->MODEL->registroPersonal(); //PARA MI RECORRIDO FOREACH 
        include_once('view/registros.php');
    }

    public function registrosActualizados() //VISTA DE LOS REGITROS DEL PERSONAL ACTUALIZADOS
    {
        //$dataPersonal = $this->MODEL->registroPersonalActualizado(); //PARA MI RECORRIDO FOREACH 
        include_once('view/registrosActualizados.php');
    }


    public function reporte()
    {
        try {
            if (isset($_REQUEST['id'])) {
                $personal = new Personal();
                $personal->setidDNI($_REQUEST['id']);
                $dataPersonal = $this->MODEL->dataPersonalActualizado($personal);
                include_once('view/reportePDF.php');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updatePersonal()
    {
        try {
            if (isset($_REQUEST['btnUpdate'])) {
                $personal = new Personal();
                $personal->setnombre($_POST['txt_nombre']);
                $personal->setapellidoPaterno($_POST['txt_apellido_paterno']);
                $personal->setapellidoMaterno($_POST['txt_apellido_materno']);
                $personal->setfecha($_POST['txt_fecha_nacimiento']);
                $personal->setactividad($_POST['txt_actividad']);
                $personal->setprofesion($_POST['cbo_profesion']);
                $personal->setcheckCovid($_POST['check_personal_covid']);
                $personal->setcheckDiris($_POST['check_diris']);
                $personal->setcheckVacuna($_POST['check_vacuna']);
                $personal->setidBrigada($_POST['cboBrigradas']);
                $personal->setobservacion($_POST['txtObservacion']);
                $personal->setestado(1);
                $personal->setidDNI($_POST['txt_dni']);

                if ($this->MODEL->actualizarReporte($personal)) {
                    $message = "Se actulizo Correctamente";
                    echo $this->MODEL->success($message);
                    include_once('view/registrosActualizados.php');
                } else {
                    $message = "No se actulizo Correctamente";
                    echo $this->MODEL->error($message);
                    include_once('view/registrosActualizados.php');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
