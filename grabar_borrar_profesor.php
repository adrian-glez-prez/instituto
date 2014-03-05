<?php
session_start();
require_once 'funcionesbd.php';

//establecer variables
$id = (isset($_SESSION['id']))?
            $_SESSION['id']:"";
//conectar con la base de datos
$db = conectaBd();

    
    $consulta = "DELETE FROM profesores 
    WHERE id= :id";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":id" => $_SESSION['id']))) {
            unset ($_SESSION['id']);
            $url = "listadoprofesores.php";
            header('Location:'.$url);
    } else {
        $url = "index.php?msg_error=Error_borrar_Registro_profesores";
        header('Location:'.$url);
    }

    $db = null;

    ?>