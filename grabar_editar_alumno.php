<?php
session_start();
require_once 'funcionesbd.php';

//establecer variables
$datos = Array();
$id = (isset($_SESSION['id']))?
            $_SESSION['id']:"";
$datos[0] = (isset($_REQUEST['nombre']))?
            $_REQUEST['nombre']:"";
$datos[1] = (isset($_REQUEST['curso']))?
            $_REQUEST['curso']:"";
//conectar con la base de datos
$db = conectaBd();

    
    $consulta = "UPDATE alumnos 
    set nombre = :nombre, 
    curso= :curso 
    WHERE id= :id";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":nombre" => $datos[0],
        ":curso" => $datos[1], 
        ":id" => $_SESSION['id']))) {
            unset ($_SESSION['id']);
            $url = "listadoalumnos.php";
            header('Location:'.$url);
    } else {
        $url = "index.php?msg_error=Error_Grabar_Registro_alumnos";
        header('Location:'.$url);
    }

    $db = null;

    ?>