<?php

include_once('config/conexion.php');

class Modelo
{
    public $PDO;

    public function __construct()
    {
        try {
            $this->PDO = new ClassConexion(); //INICIANDO LA CONEXION A LA BD
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function index()
    {
        include_once('view/index.php'); //VISTAS POR DEFECTO
    }


    
    /************************************UPDATE DEL PERSONAL PARA EL TRIAJE**************************************/
    public function actualizarReporte(Personal $personal)
    {
        try {
            $sql = "UPDATE personal 
            SET foto = ?,
                nombre = ?,
                apellidoPaterno = ?,
                apellidoMaterno = ?,
                fecha = ?,
                actividad = ?,
                profesion = ?,
                checkfiebre = ?,
                descfiebre = ?,
                checkgarganta = ?,
                descgarganta = ?,
                checkcovid = ?,
                desccovid = ?,
                checkembarazo = ?,
                descembarazo = ? ,
                checkalergia = ?,
                descalergia = ?,
                tipo_brigada  = ?,
                observaciones = ?,
                estado = ?,
                fechaRegistro=?,
                id_planilla =?,
                telefono =?,
                dosisUno =?, 
                dosisDos=?,
                cartilla=? WHERE idDNI = ?";
            $stm = $this->PDO->ConectarBD()->prepare($sql)->execute(
                array(
                    $personal->getfoto(),
                    $personal->getnombre(),
                    $personal->getapellidoPaterno(),
                    $personal->getapellidoMaterno(),
                    $personal->getfecha(),
                    $personal->getactividad(),
                    $personal->getprofesion(),
                    $personal->getcheckfiebre(),
                    $personal->getcheckdescfiebre(),
                    $personal->getcheckgarganta(),
                    $personal->getcheckdescgarganta(),
                    $personal->getcheckcovid(),
                    $personal->getcheckdesccovid(),
                    $personal->getcheckembarazo(),
                    $personal->getcheckdescembarazo(),
                    $personal->getcheckalergia(),
                    $personal->getcheckdescalergia(), //problema
                    $personal->getidBrigada(),
                    $personal->getobservacion(),
                    $personal->getestado(),
                    $personal->getfechaRegistro(),
                    $personal->getplanilla(),
                    $personal->getTelefono(),
                    $personal->getestadoDosisUno(),
                    $personal->getestadoDosisDos(),
                    $personal->getcartilla(),
                    $personal->getidDNI()
                )
            );
            return $stm;
        } catch (\Throwable $th) {
            throw $th;
        }
    } 
    /************************************************************************************************************/






    /***********************************DATOS EXCEL PLANILLA ESTADO Y FECHA**************************************/
   public function datosExcel($planilla , $estado ,$fecha_registro){
    try {
        $sql = "SELECT per.idDNI , per.nombre , per.apellidoPaterno , per.apellidoMaterno,
                    per.fecha , per.actividad , per.profesion ,
                    per.estado , per.fechaRegistro,
                    per.id_planilla , per.telefono ,
                    plani.nombre_planilla 
                FROM personal per INNER JOIN planilla plani
                ON per.id_planilla = plani.id_planilla
                WHERE per.id_planilla = ? AND per.estado = ? AND per.fechaRegistro = ?";
        $stm = $this->PDO->ConectarBD()->prepare($sql);
        $stm->execute(array(
            $planilla,
            $estado,
            $fecha_registro
        ));
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
        throw $th;
    }
   }

   //DATOS EXCEL DOS DOSIS
   public function vacunadosGeneral()
    {
        try {
            $sql = "SELECT * FROM personal WHERE fechaRegistro='2021-03-15'";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //DATOS EXCEL NO VACUNDOS
    public function segundaDosisMarzo()
    {
        try {
            $sql = "SELECT * FROM personal WHERE fechaRegistro='2021-03-15' AND  dosisUno= 6 AND  dosisDos= 7";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //DATOS EXCEL PRIMERA DOSIS
    public function primeraDosisMarzo()
    {
        try {
            $sql = "SELECT * FROM personal WHERE fechaRegistro='2021-03-15' AND  dosisUno= 6 AND  dosisDos= 0";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /*************************************************************************************************************/







    /*********************DATOS DEL PERSONAL TRAIDOS POR EL ID(DNI) PARA PINTAR LOS INPUT*************************/
    public  function dataPersonal(Personal $personal)
    {
        try {
            $sql = "SELECT * FROM personal per INNER JOIN planilla plani
                    ON per.id_planilla = plani.id_planilla 
                    WHERE per.idDNI =?";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute(array($personal->getidDNI()));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public  function dataPersonalByDNI($dni)
    {
        try {
            $sql = "SELECT * FROM personal per INNER JOIN planilla plani
                    ON per.id_planilla = plani.id_planilla 
                    WHERE per.idDNI =?";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute(array($dni));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /*************************************************************************************************************/






    /****************************************FUNCION PARA REPORTE DE PDF***************************************/
    public  function dataPersonalActualizado(Personal $personal)
    {
        try {
            $sql = "SELECT * FROM personal WHERE idDNI =?";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute(array($personal->getidDNI()));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        } //FETCH -> SOLO RETORNO UN OBJ --- FETCHALL -> RETORNA UNA CONJUNTO DE DATOS
    }
    /*************************************************************************************************************/





    /************************PAGINACIONES PARA LAS TABLAS ACTUALIZADO Y NO ACTUALIZADO******************************/
    public function registroPersonal(Paginacion $paginacion)
    {
        try {
            $sql = "SELECT * FROM personal WHERE estado=0 ORDER BY fecha DESC LIMIT " . $paginacion->getiniciar() . " , " . $paginacion->getdatos_x_paginas() . " ";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function registroPersonalActualizado(Paginacion $paginacion)
    {
        try {
            $sql = "SELECT * FROM personal WHERE estado=1 ORDER BY fecha DESC LIMIT " . $paginacion->getiniciar() . " , " . $paginacion->getdatos_x_paginas() . " ";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**************************************************************************************************************/
   




    /**********************CONTANDO LOS ESTADOS DEL PERSONAL PARA LAS ESTADISTICAS*******************************/
    public function countRegistroNoVacuna()
    {
        try {
            $sql = "SELECT * FROM personal WHERE estado=0";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function countRegistroVacuna()
    {
        try {
            $sql = "SELECT * FROM personal WHERE estado=1";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function countRegistroRevocados()
    {
        try {
            $sql = "SELECT * FROM personal WHERE estado=2";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function countRegistroDesistir()
    {
        try {
            $sql = "SELECT * FROM personal WHERE estado=3";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function countRegistroVacunaOtroCentroMedico()
    {
        try {
            $sql = "SELECT * FROM personal WHERE estado=4";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function countTotal()
    {
        try {
            $sql = "SELECT * FROM personal";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /************************************************************************************************************/
   
    




    /**********************************SACANDO LOS DE CADA ESTADO PORCENTAJE*************************************/
    function obtenerPorcentaje($cantidad , $totalDatos) {
        $total = $totalDatos;                  // Obtener total de la base de datos
        $porcentaje = (((int)$cantidad * 100) / $total); // Regla de tres
        $porcentaje = round($porcentaje, 0);   // Quitar los decimales
        return $porcentaje;
    }
    /************************************************************************************************************/






    /****************************************TABLA HORARIOS BRIGADA********************************************/
    public function dataBrigada()
    {
        try {
            $sql = "SELECT id , nombre FROM brigada";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /************************************************************************************************************/






    /****************************************TABLA DE LA PLANILLA************************************************/
    public function dataPlanilla()
    {
       try {
           $sql = "SELECT * FROM planilla";
           $stm = $this->PDO->ConectarBD()->prepare($sql);
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_OBJ);
       } catch (\Throwable $th) {
           throw $th;
       }
    }
    /************************************************************************************************************/






    /****************************************MESAGES DE ALERTAS PARA MOSTRARLE AL USUARIO***********************/
    public function success($message = "")
    {
        $resultado = '
        <div class="alert alert-success alert-dismissible fade show mover-izquierda" role="alert">
        <strong>Message!</strong> ' . $message . '
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        echo $resultado;
    }
    public function error($message = "")
    {
        $resultado = '
        <div class="alert alert-danger alert-dismissible fade show mover-izquierda" role="alert">
             <strong>Message!</strong> ' . $message . '
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        echo $resultado;
    }
    /************************************************************************************************************/
}
