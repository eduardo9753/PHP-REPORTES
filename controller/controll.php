<?php

include_once('model/model.php'); //MODELO
include_once('datos/Personal.php'); //DATOS 
include_once('datos/paginacion.php');

require('lib/pdf/fpdf.php'); //PDF
require 'lib/Excelspreadsheet/vendor/autoload.php'; //EXCEL SPREADSHEET

class Control
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new Modelo();
    }

    public  function index()
    {
        include_once('view/busqueda/search.php');
    }

    public function search()
    {
        include_once('view/busqueda/search.php');
    }



    /************************************************EXCEL FORMULARIO*************************************/
    public function excel()
    {
        $dataPlanilla = $this->MODEL->dataPlanilla();
        include_once('view/excel/excel.php');
    }

    //CREANDO LOS ARCHIVOS EXCEL 
    public function excelDatos()
    {
        try {
            if (isset($_REQUEST['btn_excel'])) {
                $planilla = $_POST['cboPlanilla'];
                $estado = $_POST['cboEstado'];
                $fecha_registro = $_POST['txt_fecha_registro'];
                $dataExcel = $this->MODEL->datosExcel($planilla, $estado, $fecha_registro);
                include_once('view/excel/excelSpresst.php');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //EXCEL VACUNADOS GENERALES
    public function VacunadosGeneral()
    {
        try {
            $dataExcel = $this->MODEL->vacunadosGeneral();
            include_once('view/excel/excelVacunadosGeneral.php');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //EXCEL VACUNADOS SEGUNDA DOSIS MARZO
    public function VacunadoSegundaDosis()
    {
        try {
            $dataExcel = $this->MODEL->segundaDosisMarzo();
            include_once('view/excel/excelSegundaDosisMarzo.php');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //EXCEL VACUNADO PRIMERA DOSIS MARZO
    public function VacunadosPrimeraDosisMarzo()
    {
        try {
            $dataExcel = $this->MODEL->primeraDosisMarzo();
            include_once('view/excel/excelPrimeraDosisMarzo.php');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /*********************************************************************************************************/







    /*******************************FORMULARIO PARA BUSCAR PERSONAL PARA SUBIR CARTILLAS**********************/
    public function cartilla()
    {
        include_once('view/busqueda/cartilla.php');
    }

    //FORMULARIO PARA SUBIR MI CARTILLA LOS QUE SE VAN A REGISTRAR EL LUNES "15/03/2021"
    public function cartillaPersonal()
    {
        try {
            if (isset($_REQUEST['btnBuscar'])) {

                $dataPersonal = $this->MODEL->dataPersonalByDNI($_POST['txt_dni']);
                if ($dataPersonal && $dataPersonal->dosisUno == 6 && $dataPersonal->cartilla == 'cartilla.jpg') {
                    include_once('view/triaje/cartillaPersonal.php');
                } else if ($dataPersonal && $dataPersonal->dosisUno == 6 && $dataPersonal->cartilla !== 'cartilla.jpg') {
                    $message = "YA SE ACTUALIZO SU CARTILLA";
                    echo $this->MODEL->error($message);
                    include_once('view/busqueda/cartilla.php');
                } else {
                    $message = "NO SE ENCONTRO DATOS";
                    echo $this->MODEL->error($message);
                    include_once('view/busqueda/cartilla.php');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateCartillaPersonal()
    {
        try {
            if (isset($_REQUEST['btnUpdateCartilla'])) {
                $directorio = "cartillas/";
                $cartilla = $directorio . basename($_FILES['cartilla']['name']);
                if (move_uploaded_file($_FILES['cartilla']['tmp_name'], $cartilla)) {
                    $personal = new Personal();
                    $dataCartilla = $this->MODEL->dataPersonalByDNI($_POST['txt_dni']);

                    $personal->setfoto($dataCartilla->foto);
                    $personal->setnombre(strtoupper($_POST['txt_nombre']));
                    $personal->setapellidoPaterno(strtoupper($_POST['txt_apellido_paterno']));
                    $personal->setapellidoMaterno(strtoupper($_POST['txt_apellido_materno']));
                    $personal->setfecha(strtoupper($_POST['txt_fecha_nacimiento']));
                    $personal->setactividad(strtoupper($_POST['txt_actividad']));
                    $personal->setprofesion(strtoupper($_POST['cbo_profesion']));
                    $personal->setcheckfiebre($dataCartilla->checkfiebre);
                    $personal->setcheckdescfiebre($dataCartilla->descfiebre);
                    $personal->setcheckgarganta($dataCartilla->checkgarganta);
                    $personal->setcheckdescgarganta($dataCartilla->descgarganta);
                    $personal->setcheckcovid($dataCartilla->checkcovid);
                    $personal->setcheckdesccovid($dataCartilla->desccovid);
                    $personal->setcheckembarazo($dataCartilla->checkembarazo);
                    $personal->setcheckdescembarazo($dataCartilla->descembarazo);
                    $personal->setcheckalergia($dataCartilla->checkalergia);
                    $personal->setcheckdescalergia($dataCartilla->descalergia);
                    $personal->setidBrigada($_POST['cboBrigradas']);
                    $personal->setobservacion(strtoupper($_POST['txtObservacion']));
                    $personal->setestado($dataCartilla->estado);
                    $personal->setfechaRegistro($_POST['txt_fecha_actual']);
                    $personal->setplanilla($_POST['idPlanilla']);
                    $personal->settelefono($_POST['txt_celular']);
                    $personal->setestadoDosisUno($dataCartilla->dosisUno);
                    $personal->setestadoDosisDos($dataCartilla->dosisDos);
                    $personal->setcartilla($cartilla);
                    $personal->setidDNI($_POST['txt_dni']);

                    if ($this->MODEL->actualizarReporte($personal)) {
                        $message = "SE ACTUALIZO CORRECTAMENTE LOS DATOS";
                        echo $this->MODEL->success($message);
                        include_once('view/busqueda/cartilla.php');
                    } else {
                        $message = "NO SE PUEDO ACTUALIZAR LOS DATOS";
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/cartilla.php');
                    }
                } else {
                    $message = "NO SE PUEDO ACTUALIZAR LOS DATOS";
                    echo $this->MODEL->error($message);
                    include_once('view/busqueda/cartilla.php');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /*********************************************************************************************************/





    /**********************************PARA VER LAS CARTILLAS DE LA BASE DE DATOS*****************************/
    public function verCartilla()
    {
        include_once('view/busqueda/verCartilla.php');
    }

    public function verCartillaPersonal()
    {
        if (isset($_REQUEST['btnBuscar'])) {
            $dataPersonal = $this->MODEL->dataPersonalByDNI($_POST['txt_dni']);
            if ($dataPersonal && $dataPersonal->estado == 1 && $dataPersonal->dosisUno == 6) {
                include_once('view/triaje/verCartillaPersonal.php');
            } else {
                $message = "NO SE PUEDO ENCONTRAR EL DATO";
                echo $this->MODEL->error($message);
                include_once('view/busqueda/verCartilla.php');
            }
        }
    }
    /**********************************************************************************************************/





    /*********ACTUALIZAR PERSONAL PARA LA PRIMERA DOSIS DE LA VACUNA Y CAPTURAR FECHA DE REGISTRO*************/
    public function updatePersonal()
    {
        try {
            if (isset($_REQUEST['btnUpdate'])) {
                if (isset($_POST['cboEstado'])) {
                    if ($_POST['cboEstado'] == 3) {
                        $check_fiebre = '--';
                        $txt_fiebre = '---';
                        $check_garganta = '--';
                        $txt_garganta = '---';
                        $check_covid = '--';
                        $txt_covid = '---';
                        $check_embarazo = '--';
                        $txt_embarazo = '---';
                        $check_alergia = '--';
                        $txt_alergia = '---';
                        $estado = 3;
                        $dosisUno = 0;
                        $dosisDos = 0;
                    }
                    if ($_POST['cboEstado'] == 4) {
                        $check_fiebre = '--';
                        $txt_fiebre = '---';
                        $check_garganta = '--';
                        $txt_garganta = '---';
                        $check_covid = '--';
                        $txt_covid = '---';
                        $check_embarazo = '--';
                        $txt_embarazo = '---';
                        $check_alergia = '--';
                        $txt_alergia = '---';
                        $estado = 4;
                        $dosisUno = 0;
                        $dosisDos = 0;
                    }
                }
                //VERIFICAR SI HAY DATOS
                if (isset($_POST['check_fiebre1'])) {
                    $check_fiebre = 'NO';
                    $txt_fiebre = '---';
                } else if (isset($_POST['check_fiebre2'])) {
                    $check_fiebre = 'SI';
                    $txt_fiebre = $_POST['txt_fiebre'];
                }
                if (isset($_POST['check_garganta1'])) {
                    $check_garganta = 'NO';
                    $txt_garganta = '---';
                } else if (isset($_POST['check_garganta2'])) {
                    $check_garganta = 'SI';
                    $txt_garganta = $_POST['txt_garganta'];
                }
                if (isset($_POST['check_covid1'])) {
                    $check_covid = 'NO';
                    $txt_covid = '---';
                } else if (isset($_POST['check_covid2'])) {
                    $check_covid = 'SI';
                    $txt_covid = $_POST['txt_covid'];
                }
                if (isset($_POST['check_embarazo1'])) {
                    $check_embarazo = 'NO';
                    $txt_embarazo = '---';
                } else if (isset($_POST['check_embarazo2'])) {
                    $check_embarazo = 'SI';
                    $txt_embarazo = $_POST['txt_embarazo'];
                }
                if (isset($_POST['check_alergia1'])) {
                    $check_alergia = 'NO';
                    $txt_alergia = '---';
                } else if (isset($_POST['check_alergia2'])) {
                    $check_alergia = 'SI';
                    $txt_alergia = $_POST['txt_alergia'];
                }
                //VALIDANDO SI TODOS LOS CHECK SON "NO"
                if (
                    isset($_POST['check_fiebre1']) && isset($_POST['check_garganta1']) &&
                    isset($_POST['check_covid1']) &&  isset($_POST['check_embarazo1']) && isset($_POST['check_alergia1'])
                ) {
                    $estado = 1;
                    $dosisUno = 6;
                    $dosisDos = 0;
                }
                //VALIDACION REVOCATORIA SI AL MENOS TIENE UN  CHECK "SI" MARCADO
                if (
                    isset($_POST['check_fiebre2']) || isset($_POST['check_garganta2']) ||
                    isset($_POST['check_covid2']) || isset($_POST['check_embarazo2']) || isset($_POST['check_alergia2'])
                ) {
                    $estado = 1;
                    $dosisUno = 6;
                    $dosisDos = 0;
                }

                $personal = new Personal();
                $directorio = "upload/";
                $archivo = $directorio . basename($_FILES['file']['name']);
                $cartilla = "cartilla.jpg";

                if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
                    $personal->setfoto($archivo);
                    $personal->setnombre(strtoupper($_POST['txt_nombre']));
                    $personal->setapellidoPaterno(strtoupper($_POST['txt_apellido_paterno']));
                    $personal->setapellidoMaterno(strtoupper($_POST['txt_apellido_materno']));
                    $personal->setfecha(strtoupper($_POST['txt_fecha_nacimiento']));
                    $personal->setactividad(strtoupper($_POST['txt_actividad']));
                    $personal->setprofesion(strtoupper($_POST['cbo_profesion']));
                    $personal->setcheckfiebre($check_fiebre);
                    $personal->setcheckdescfiebre($txt_fiebre);
                    $personal->setcheckgarganta($check_garganta);
                    $personal->setcheckdescgarganta($txt_garganta);
                    $personal->setcheckcovid($check_covid);
                    $personal->setcheckdesccovid($txt_covid);
                    $personal->setcheckembarazo($check_embarazo);
                    $personal->setcheckdescembarazo($txt_embarazo);
                    $personal->setcheckalergia($check_alergia);
                    $personal->setcheckdescalergia($txt_alergia);
                    $personal->setidBrigada($_POST['cboBrigradas']);
                    $personal->setobservacion(strtoupper($_POST['txtObservacion']));
                    $personal->setestado($estado);
                    $personal->setfechaRegistro($_POST['txt_fecha_actual']);
                    $personal->setplanilla($_POST['idPlanilla']);
                    $personal->settelefono($_POST['txt_celular']);
                    $personal->setestadoDosisUno($dosisUno);
                    $personal->setestadoDosisDos($dosisDos);
                    $personal->setcartilla($cartilla);
                    $personal->setidDNI($_POST['txt_dni']);

                    if ($this->MODEL->actualizarReporte($personal)) {
                        $personal->setidDNI($_POST['txt_dni']);
                        $dataPersonal = $this->MODEL->dataPersonal($personal);
                        if ($dataPersonal && $dataPersonal->estado == 1) {
                            $message = "SE ACTUALIZO COREECTAMENTE LOS DATOS DEL PERSONAL";
                            echo $this->MODEL->success($message);
                            //FORMULARIO TRIAJE Y CONSENTIMIENTO INFORMADO
                            include_once('view/triaje/dataTriajeActualizado.php');
                        } else if ($dataPersonal && $dataPersonal->estado == 3) {
                            $message = "EL PERSONAL CON DNI :" . $_REQUEST['txt_dni'] . ". DESISTIO A VACUNARSE";
                            echo $this->MODEL->error($message);
                            include_once('view/busqueda/search.php');            //DESISTIERON
                        } else if ($dataPersonal && $dataPersonal->estado == 4) {
                            $message = "EL PERSONAL CON DNI :" . $_REQUEST['txt_dni'] . " FUE VACUNADO EN OTRO CENTRO DE SALUD";
                            echo $this->MODEL->error($message);
                            include_once('view/busqueda/search.php');           //VACUNADO EN OTRO CENTRO DE SALUD
                        }
                    } else {
                        $message = "NO SE ACTUALIZO LOS DATOS";
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/search.php');
                    }
                } else {
                    $personal->setfoto('upload/user.jpg');
                    $personal->setnombre(strtoupper($_POST['txt_nombre']));
                    $personal->setapellidoPaterno(strtoupper($_POST['txt_apellido_paterno']));
                    $personal->setapellidoMaterno(strtoupper($_POST['txt_apellido_materno']));
                    $personal->setfecha(strtoupper($_POST['txt_fecha_nacimiento']));
                    $personal->setactividad(strtoupper($_POST['txt_actividad']));
                    $personal->setprofesion(strtoupper($_POST['cbo_profesion']));
                    $personal->setcheckfiebre($check_fiebre);
                    $personal->setcheckdescfiebre($txt_fiebre);
                    $personal->setcheckgarganta($check_garganta);
                    $personal->setcheckdescgarganta($txt_garganta);
                    $personal->setcheckcovid($check_covid);
                    $personal->setcheckdesccovid($txt_covid);
                    $personal->setcheckembarazo($check_embarazo);
                    $personal->setcheckdescembarazo($txt_embarazo);
                    $personal->setcheckalergia($check_alergia);
                    $personal->setcheckdescalergia($txt_alergia);
                    $personal->setidBrigada($_POST['cboBrigradas']);
                    $personal->setobservacion(strtoupper($_POST['txtObservacion']));
                    $personal->setestado($estado);
                    $personal->setfechaRegistro($_POST['txt_fecha_actual']);
                    $personal->setplanilla($_POST['idPlanilla']);
                    $personal->settelefono($_POST['txt_celular']);
                    $personal->setestadoDosisUno($dosisUno);
                    $personal->setestadoDosisDos($dosisDos);
                    $personal->setcartilla($cartilla);
                    $personal->setidDNI($_POST['txt_dni']);

                    if ($this->MODEL->actualizarReporte($personal)) {
                        $personal->setidDNI($_POST['txt_dni']);
                        $dataPersonal = $this->MODEL->dataPersonal($personal);
                        if ($dataPersonal && $dataPersonal->estado == 1) {
                            $message = "SE ACTUALIZO COREECTAMENTE LOS DATOS DEL PERSONAL";
                            echo $this->MODEL->success($message);
                            //FORMULARIO TRIAJE Y CONSENTIMIENTO INFORMADO
                            include_once('view/triaje/dataTriajeActualizado.php');
                        } else if ($dataPersonal && $dataPersonal->estado == 3) {
                            $message = "EL PERSONAL CON DNI :" . $_REQUEST['txt_dni'] . ". DESISTIO A VACUNARSE";
                            echo $this->MODEL->error($message);
                            include_once('view/busqueda/search.php');            //DESISTIERON
                        } else if ($dataPersonal && $dataPersonal->estado == 4) {
                            $message = "EL PERSONAL CON DNI :" . $_REQUEST['txt_dni'] . " FUE VACUNADO EN OTRO CENTRO DE SALUD";
                            echo $this->MODEL->error($message);
                            include_once('view/busqueda/search.php');           //VACUNADO EN OTRO CENTRO DE SALUD
                        }
                    } else {
                        $message = "NO SE ACTUALIZO LOS DATOS";
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/search.php');
                    }
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /*********************************************************************************************************/






    /*****ACTUALIZACION DE LA SEGUNDA DOSIS DE LA VACUNA  /febrero/marzo/abril "NO SE LES SUBIRA CARTILLA"***/
    public function updateSegundaDosis()
    {
        try {
            if (isset($_REQUEST['btnUpdateDosisDos'])) {
                $dataDosisDos = $this->MODEL->dataPersonalByDNI($_POST['txt_dni']);
                $dosisUno = 6;
                $dosisDos = 7;
                $cartilla = "cartilla.jpg";
                $personal = new Personal();
                $personal->setfoto($dataDosisDos->foto);
                $personal->setnombre(strtoupper($_POST['txt_nombre']));
                $personal->setapellidoPaterno(strtoupper($_POST['txt_apellido_paterno']));
                $personal->setapellidoMaterno(strtoupper($_POST['txt_apellido_materno']));
                $personal->setfecha(strtoupper($_POST['txt_fecha_nacimiento']));
                $personal->setactividad(strtoupper($_POST['txt_actividad']));
                $personal->setprofesion(strtoupper($_POST['cbo_profesion']));
                $personal->setcheckfiebre($dataDosisDos->checkfiebre);
                $personal->setcheckdescfiebre($dataDosisDos->descfiebre);
                $personal->setcheckgarganta($dataDosisDos->checkgarganta);
                $personal->setcheckdescgarganta($dataDosisDos->descgarganta);
                $personal->setcheckcovid($dataDosisDos->checkcovid);
                $personal->setcheckdesccovid($dataDosisDos->desccovid);
                $personal->setcheckembarazo($dataDosisDos->checkembarazo);
                $personal->setcheckdescembarazo($dataDosisDos->descembarazo);
                $personal->setcheckalergia($dataDosisDos->checkalergia);
                $personal->setcheckdescalergia($dataDosisDos->descalergia);
                $personal->setidBrigada($_POST['cboBrigradas']);
                $personal->setobservacion(strtoupper($_POST['txtObservacion']));
                $personal->setestado(1);
                $personal->setfechaRegistro($_POST['txt_fecha_actual']);
                $personal->setplanilla($_POST['idPlanilla']);
                $personal->settelefono($_POST['txt_celular']);
                $personal->setestadoDosisUno($dosisUno);
                $personal->setestadoDosisDos($dosisDos);
                $personal->setcartilla($cartilla);
                $personal->setidDNI($_POST['txt_dni']);

                if ($this->MODEL->actualizarReporte($personal)) {
                    $message = "SE ACTUALIZO LA SEGUNDA DOSIS DEL PERSONAL....PUEDE DIGITAR OTRO DNI";
                    echo $this->MODEL->success($message);
                    include_once('view/busqueda/search.php');
                } else {
                    $message = "NO SE ACTUALIZO LOS DATOS";
                    echo $this->MODEL->error($message);
                    include_once('view/busqueda/search.php');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /*********************************************************************************************************/





    /***********************************FORMULARIO BUSQUEDA DESISTIR VACUNA**********************************/
    public function desistirPersonal()
    {
        include_once('view/busqueda/desistir.php');
    }
    //FORMULARIO PINTANDO DATOS DE LOS QUE DESISTIERON
    public function dataDesistirPersonal()
    {
        try {
            if (isset($_REQUEST['btnBuscar'])) {
                if (isset($_REQUEST['txt_dni'])) {
                    $personal = new Personal();
                    $personal->setidDNI($_POST['txt_dni']);
                    $dataPersonal = $this->MODEL->dataPersonal($personal);
                    if ($dataPersonal && $dataPersonal->estado == 1) {
                        include_once('view/triaje/desistirVacuna.php');
                    } else if ($dataPersonal && $dataPersonal->estado == 3) {
                        $message = "EL PERSONAL CON DNI CON EL DNI : " . $_REQUEST['txt_dni'] . " YA DESISTIO A VACUNARSE";
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/search.php'); //SIN DATOS
                    } else {
                        $message = "EL PERSONAL CON DNI CON EL DNI : " . $_REQUEST['txt_dni'] . " NO SE PUDO ENCONTRAR";
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/search.php'); //SIN DATOS
                    }
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //ACTUALIZANDO LOS DATOS A REVOCADOS EN LA COLA
    public function desistirUpdate()
    {
        if (isset($_REQUEST['btnDesistir'])) {
            if (isset($_POST['cboEstado'])) {
                if ($_POST['cboEstado'] == 3) {
                    $estado = 3;
                } else {
                    $estado = 3;
                }
            }
            $cartilla = "cartillaDesistida.jpg";
            $dataDesistir = $this->MODEL->dataPersonalByDNI($_POST['txt_dni']);
            $personal = new Personal();
            $personal->setfoto($dataDesistir->foto);
            $personal->setnombre(strtoupper($dataDesistir->nombre));
            $personal->setapellidoPaterno(strtoupper($dataDesistir->apellidoPaterno));
            $personal->setapellidoMaterno(strtoupper($dataDesistir->apellidoMaterno));
            $personal->setfecha(strtoupper($dataDesistir->fecha));
            $personal->setactividad(strtoupper($dataDesistir->actividad));
            $personal->setprofesion(strtoupper($dataDesistir->profesion));
            $personal->setcheckfiebre($dataDesistir->checkfiebre);
            $personal->setcheckdescfiebre($dataDesistir->descfiebre);
            $personal->setcheckgarganta($dataDesistir->checkgarganta);
            $personal->setcheckdescgarganta($dataDesistir->descgarganta);
            $personal->setcheckcovid($dataDesistir->checkcovid);
            $personal->setcheckdesccovid($dataDesistir->desccovid);
            $personal->setcheckembarazo($dataDesistir->checkembarazo);
            $personal->setcheckdescembarazo($dataDesistir->descembarazo);
            $personal->setcheckalergia($dataDesistir->checkalergia);
            $personal->setcheckdescalergia($dataDesistir->descalergia);
            $personal->setidBrigada($dataDesistir->tipo_brigada);
            $personal->setobservacion(strtoupper($_POST['txtObservacion']));
            $personal->setestado($estado);
            $personal->setfechaRegistro($_POST['txt_fecha_actual']);
            $personal->setplanilla($dataDesistir->id_planilla);
            $personal->settelefono($dataDesistir->telefono);
            $personal->setestadoDosisUno(0);
            $personal->setestadoDosisDos(0);
            $personal->setcartilla($cartilla);
            $personal->setidDNI($_POST['txt_dni']);

            if ($this->MODEL->actualizarReporte($personal)) {
                $message = "SE ACTULIZO EL PERSONAL A ESTADO DESISTIR VACUNACION";
                echo $this->MODEL->success($message);
                include_once('view/busqueda/search.php');
            } else {
                $message = "NO SE ACTUALIZO LOS DATOS";
                echo $this->MODEL->error($message);
                include_once('view/busqueda/search.php');
            }
        }
    }
    /*********************************************************************************************************/






    /*********************************TRIAJE DEL PERSONAL POR ESTADO*****************************************/
    public function dataPersonal()
    {
        try {
            if (isset($_REQUEST['btnBuscar'])) {
                if (isset($_REQUEST['txt_dni'])) {
                    $personal = new Personal();
                    $personal->setidDNI($_POST['txt_dni']);
                    $dataPersonal = $this->MODEL->dataPersonal($personal);
                    if ($dataPersonal && $dataPersonal->estado == 0 && $dataPersonal->dosisUno == 0 && $dataPersonal->dosisDos == 0) {
                        //FORMULARIO PARA ACTUALIZAR A PRIMERA DOSIS DE VACUNACION
                        include_once('view/triaje/dataTriaje.php');
                    } else if ($dataPersonal &&  $dataPersonal->fechaRegistro == "2021-02-22" && $dataPersonal->estado == 1 && $dataPersonal->dosisUno == 6 && $dataPersonal->dosisDos == 0) {
                        //FORMULARIO DE VACUNA SEGUNDA DOSIS FEBRERO 2021-02-22 (FECHA QUEDA REGISTRO)
                        include_once('view/triaje/SegundaDosisFebrero.php');
                    } else if ($dataPersonal &&  $dataPersonal->fechaRegistro == "2021-03-11" && $dataPersonal->estado == 1 && $dataPersonal->dosisUno == 6 && $dataPersonal->dosisDos == 0) {
                        //PROXIMAMENTE FORMULARIO DE VACUNACION PARA LOS QUE SE VACUNARON EN MARZO
                        $message = "EL PERSONAL CON DNI :" . $_REQUEST['txt_dni'] . ". DEBE VACUNARSE EN EL MES DE ABRIL";
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/search.php');
                    } else if ($dataPersonal && $dataPersonal->estado == 1 && $dataPersonal->dosisUno == 6 && $dataPersonal->dosisDos == 7) {
                        //MENSAJE PARA LOS QUE YA SE APLICO LA PRIMERA Y SEGUNDA VACUNA
                        $message = "EL PERSONAL CON DNI :" . $_REQUEST['txt_dni'] . ". YA OBTUVO LAS DOS DOSIS DE LA VACUNA";
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/search.php');
                    } else if ($dataPersonal /*&& $dataPersonal->fechaRegistro == "2021-03-14"*/ && $dataPersonal->estado == 1 && $dataPersonal->dosisUno == 6 && $dataPersonal->dosisDos == 0) {
                        //FORMULARIO TRIAJE CONSENTIMIENTO INFORMADO Y CARTILLA DE VACUNACION
                        include_once('view/triaje/dataTriajeActualizado.php');
                    } else if ($dataPersonal && $dataPersonal->estado == 3) {
                        $message = "EL PERSONAL CON DNI :" . $_REQUEST['txt_dni'] . ". DESISTIO A VACUNARSE";
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/search.php');            //DESISTIERON
                    } else if ($dataPersonal && $dataPersonal->estado == 4) {
                        $message = "EL PERSONAL CON DNI :" . $_REQUEST['txt_dni'] . " FUE VACUNADO EN OTRO CENTRO DE SALUD";
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/search.php');           //VACUNADO EN OTRO CENTRO DE SALUD
                    } else {
                        $message = "NO SE ENCONTRO DATOS CON EL DNI : " . $_REQUEST['txt_dni'];
                        echo $this->MODEL->error($message);
                        include_once('view/busqueda/search.php'); //SIN DATOS
                    }
                }
            } else if (isset($_REQUEST['id'])) { //ID DESDE LA TABLA REGISTROS SIN ACTUALIZAR
                $personal = new Personal();
                $personal->setidDNI($_REQUEST['id']);
                $dataPersonal = $this->MODEL->dataPersonal($personal);
                include_once('view/triaje/dataTriaje.php'); //VISTA DE LOS DATOS CARGADOS POR ID(DNI)
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /*********************************************************************************************************/






    /***********************************REPORTE PDF DE LOS TRIAJES YA RESPONDIDOS****************************/
    public function reporte()
    {
        try {
            if (isset($_REQUEST['id'])) {
                $personal = new Personal();
                $personal->setidDNI($_REQUEST['id']);
                $dataPersonal = $this->MODEL->dataPersonalActualizado($personal);
                if ($dataPersonal && $dataPersonal->estado == 1) {
                    $message = 'PRIMERA DOSIS APLICADA';
                    include_once('view/reportes/reportePDF.php'); //TRIAJE PDF
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //REPORTE DE PDF PARA HOJA DE CONCENTIMIENTO PARA LA VACAUNACION
    public function reporteConsentimiento()
    {
        try {
            if (isset($_REQUEST['id'])) {
                $personal = new Personal();
                $personal->setidDNI($_REQUEST['id']);
                $dataPersonal = $this->MODEL->dataPersonalActualizado($personal);
                include_once('view/reportes/reporteConsentimientoPDF.php'); //HOJA PDF REPORTES CONSENTIMIENTO ()
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //REPORTE DE PDF PARA HOJA DE CARTILLA DE VACUNACION
    public function cartillaVacuna()
    {
        try {
            if (isset($_REQUEST['id'])) {
                $personal = new Personal();
                $personal->setidDNI($_REQUEST['id']);
                $dataPersonal = $this->MODEL->dataPersonalActualizado($personal);
                include_once('view/reportes/cartillaVacunaPDF.php'); //HOJA PDF REPORTES CONSENTIMIENTO ()
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /*********************************************************************************************************/






    /*****************************************ESTADISTICAS DE VACUNACION DATOS********************************/
    public function esPersonalVacunado()
    {
        try {
            $personalSinVacuna = intval($this->MODEL->countRegistroNoVacuna());
            $personalConVacuna = intval($this->MODEL->countRegistroVacuna());
            $personalRevocado = intval($this->MODEL->countRegistroRevocados());
            $personalDesistir = intval($this->MODEL->countRegistroDesistir());
            $personalOtroCentroSalud = intval($this->MODEL->countRegistroVacunaOtroCentroMedico());
            $personalTotal = intval($this->MODEL->countTotal());

            //PORCENTAJE DE VACUNADOS
            $porcentajeSinVacuna = $this->MODEL->obtenerPorcentaje($personalSinVacuna, $personalTotal);
            $porcentajeConVacuna = $this->MODEL->obtenerPorcentaje($personalConVacuna, $personalTotal);
            $porcentajeRevocado = $this->MODEL->obtenerPorcentaje($personalRevocado, $personalTotal);
            $porcentajeDesistir = $this->MODEL->obtenerPorcentaje($personalDesistir, $personalTotal);
            $porcentajeOtroCentroSalud = $this->MODEL->obtenerPorcentaje($personalOtroCentroSalud, $personalTotal);
            $porcentajeTotal = $this->MODEL->obtenerPorcentaje($personalTotal, $personalTotal);
            include_once('view/estadistica/datosVacunacion.php');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /*********************************************************************************************************/






    /*************************************REGISTROS Y PAGINACION DE DATOS************************************/
    public function registros()
    {
        $datosTotales = intval($this->MODEL->countRegistroNoVacuna());
        $datos_x_paginas = 25;
        $paginas = ceil($datosTotales / $datos_x_paginas);
        $iniciar = (($_GET['pagina'] - 1) * $datos_x_paginas);
        $paginacion = new Paginacion();
        $paginacion->setiniciar($iniciar);
        $paginacion->setdatos_x_paginas($datos_x_paginas);
        $paginacionData = $this->MODEL->registroPersonal($paginacion); //PARA MI RECORRIDO FOREACH 
        include_once('view/registros/registros.php');
    }
    public function registrosActualizados()
    {
        $datosTotales = intval($this->MODEL->countRegistroVacuna());
        $datos_x_paginas = 25;
        $paginas = ceil($datosTotales / $datos_x_paginas);
        $iniciar = (($_GET['pagina'] - 1) * $datos_x_paginas);
        $paginacion = new Paginacion();
        $paginacion->setiniciar($iniciar);
        $paginacion->setdatos_x_paginas($datos_x_paginas);
        $paginacionData = $this->MODEL->registroPersonalActualizado($paginacion); //PARA MI RECORRIDO FOREACH  
        include_once('view/registros/registrosActualizados.php');
    }
    /**********************************************************************************************************/
}
