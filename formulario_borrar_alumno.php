<?php 
session_start();
require_once 'funcionesbd.php'; 
//establecer variables
$_SESSION['id'] = (isset($_REQUEST['id']))?
            $_REQUEST['id']:"";
$datos = Array();
//conectar con la base de datos
$bd = conectaBd();
$consulta = "SELECT * FROM alumnos WHERE id=".$_SESSION['id'];
$resultado = $bd->query($consulta);

if (!$resultado) {
       $url = "index.php?msg_error=Error_Consulta_Borrar";
       header('Location:'.$url);
} else { 
       $registro = $resultado->fetch(); 
       if(!$registro) {
           $url = "index.php?msg_error=Error_Registro_alumno_inexistente";
           header('Location:'.$url);
       } else {
           $datos[0] = $registro['nombre'];
           $datos[1] = $registro['curso'];
       }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>Está seguro de que desea eliminar a este alumno?</div>
        <div>Nombre: <?php echo $datos[0]?></div>
        <div>Curso: <?php echo $datos[1]?></div>
        <form action="grabar_borrar_alumno.php" method="post">
            <input type="submit" value="Si"/>
        </form>
        <form action="listadoalumnos.php" method="post">
            <input type="submit" value="No"/>
        </form>  
    </body>
</html>