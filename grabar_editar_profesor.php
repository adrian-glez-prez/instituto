<?php
session_start();
require_once 'funcionesbd.php';

//establecer variables
$datos = Array();
$id = (isset($_SESSION['id']))?
            $_SESSION['id']:"";
$datos[0] = (isset($_REQUEST['nombre']))?
            $_REQUEST['nombre']:"";
$datos[1] = (isset($_REQUEST['asignatura']))?
            $_REQUEST['asignatura']:"";
$db = conectaBd();

    
    $consulta = "UPDATE profesores 
    set nombre = :nombre, 
    asignatura= :asignatura 
    WHERE id= :id";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":nombre" => $datos[0],
        ":asignatura" => $datos[1], 
        ":id" => $_SESSION['id']))) {
            unset ($_SESSION['id']);
            $url = "listadoprofesores.php";
            header('Location:'.$url);
    } else {
        $url = "index.php?msg_error=Error_Grabar_Registro_Software";
        header('Location:'.$url);
    }

    $db = null;

    ?>