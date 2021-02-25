<?php

include_once('config/conexion.php');

class Modelo
{

    public $PDO;

    public function __construct()
    {
        try {
            $this->PDO = new ClassConexion();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function index()
    {
        include_once('view/index.php');
    }

    public  function insertReporte(Personal $personal) //INSERT PERSONAL
    {
        try {
            $sql = "INSERT INTO personal(idDNI,nombre,apellidoPaterno,apellidoMaterno,fecha,actividad,profesion,checkCovid,checkDiris,checkVacuna,tipo_brigada,observaciones,estado)  
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stm = $this->PDO->ConectarBD()->prepare($sql)->execute(
                array(
                    $personal->getidDNI(),
                    $personal->getnombre(),
                    $personal->getapellidoPaterno(),
                    $personal->getapellidoMaterno(),
                    $personal->getfecha(),
                    $personal->getactividad(),
                    $personal->getprofesion(),
                    $personal->getcheckCovid(),
                    $personal->getcheckDiris(),
                    $personal->getcheckVacuna(),
                    $personal->getidBrigada(),
                    $personal->getobservacion(),
                    $personal->getestado()
                )
            );
            return $stm;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function actualizarReporte(Personal $personal) //UPDATE PERSONAL
    {
        try {
            $sql = "UPDATE personal 
                    SET nombre = ? ,
                        apellidoPaterno = ? ,
                        apellidoMaterno = ?,
                        fecha = ?,
                        actividad = ?,
                        profesion = ?,
                        checkCovid = ?,
                        checkDiris = ?,
                        checkVacuna = ?,
                        tipo_brigada  = ?,
                        observaciones = ?,
                        estado = ? WHERE idDNI = ?";
            $stm = $this->PDO->ConectarBD()->prepare($sql)->execute(
                array(
                    $personal->getnombre(),
                    $personal->getapellidoPaterno(),
                    $personal->getapellidoMaterno(),
                    $personal->getfecha(),
                    $personal->getactividad(),
                    $personal->getprofesion(),
                    $personal->getcheckCovid(),
                    $personal->getcheckDiris(),
                    $personal->getcheckVacuna(),
                    $personal->getidBrigada(),
                    $personal->getobservacion(),
                    $personal->getestado(),
                    $personal->getidDNI()
                )
            );
            return $stm;
        } catch (\Throwable $th) {
            throw $th;
        }
    }




    //DATOS DEL PERSONAL POR ID SIN ACTUALIZAR
    public  function dataPersonal(Personal $personal) 
    {
        try {
            $sql = "SELECT * FROM personal WHERE idDNI =? AND estado=0";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute(array($personal->getidDNI()));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public  function dataPersonalActualizado(Personal $personal) 
    {                                                           
        try {
            $sql = "SELECT * FROM personal WHERE idDNI =? AND estado=1";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute(array($personal->getidDNI()));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        } //FETCH -> SOLO RETORNO UN OBJ --- FETCHALL -> RETORNA UNA CONJUNTO DE DATOS
    }
    //DATOS DEL PERSONAL POR ID ACTUALIZADO




    public function dataBrigada() //DATOS DE LA BRIFADA(HORARIOS)
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



    //TABLA DE DATOS DEL PERSONAL SIN ACTUALIZAR (PAGINAR)
    public function registroPersonal(Paginacion $paginacion) 
    {
        try {
            $sql = "SELECT * FROM personal WHERE estado=0 ORDER BY fecha DESC LIMIT ".$paginacion->getiniciar()." , ".$paginacion->getdatos_x_paginas()." ";
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
            $sql = "SELECT * FROM personal WHERE estado=1 ORDER BY fecha DESC LIMIT ".$paginacion->getiniciar()." , ".$paginacion->getdatos_x_paginas()." ";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //TABLA DE DATOS DEL PERSONAL ACTUALIZADO(PAGINAR)



    //PENDIENTE , NUMERO TOTATES DE REGISTROS POR PERSONAL SIN ACTUALIZAR
    public function countRegistroPersonal()
    {
        try { 
            $sql = "SELECT * FROM personal WHERE estado=0";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowcount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function countRegistroPersonalActualizado()
    {
        try { 
            $sql = "SELECT COUNT(*) FROM personal WHERE estado=1";
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //PENDIENTE , NUMERO TOTATES DE REGISTROS POR PERSONAL ACTUALIZADAS
 



    public function success($message = "")
    {
        $resultado = '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Message!</strong> ' . $message . '
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        echo $resultado;
    }

    public function error($message = "")
    {
        $resultado = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Message!</strong> ' . $message . '
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        echo $resultado;
    }
}
