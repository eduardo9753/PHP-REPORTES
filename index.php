<?php

include_once('control/controll.php');


$controller = new Control();

if(!isset($_REQUEST['ruta'])){
    $controller->index();
} else {
    $peticion = $_REQUEST['ruta'];
    call_user_func(array($controller , $peticion));
}



