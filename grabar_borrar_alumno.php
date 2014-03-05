<?php
session_start();
require_once 'funcionesbd.php';

//establecer variables
$id = (isset($_SESSION['id']))?
            $_SESSION['id']:"";
//conectar con la base de datos
$db = conectaBd();

    
    $consulta = "DELETE FROM alumnos 
    WHERE id= :id";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":id" => $_SESSION['id']))) {
            unset ($_SESSION['id']);
            $url = "listadoalumnos.php";
            header('Location:'.$url);
    } else {
        $url = "index.php?msg_error=Error_borrar_Registro_alumnos";
        header('Location:'.$url);
    }

    $db = null;

    ?>