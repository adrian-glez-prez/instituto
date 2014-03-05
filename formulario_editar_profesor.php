<?php 
session_start();
require_once 'funcionesbd.php'; 
//establecer variables
$_SESSION['id'] = (isset($_REQUEST['id']))?
            $_REQUEST['id']:"";
$datos = Array();
//conectar con la base de datos
$bd = conectaBd();
$consulta = "SELECT * FROM profesores WHERE id=".$_SESSION['id'];
$resultado = $bd->query($consulta);

if (!$resultado) {
       $url = "index.php?msg_error=Error_Consulta_Editar";
       header('Location:'.$url);
} else { 
       $registro = $resultado->fetch(); 
       if(!$registro) {
           $url = "index.php?msg_error=Error_Registro_Profesor_inexistente";
           header('Location:'.$url);
       } else {
           $datos[0] = $registro['nombre'];
           $datos[1] = $registro['asignatura'];
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
        <title>Editar Profesor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>Editar Profesor</div>
        <form action="grabar_editar_profesor.php?id="<?php echo $_SESSION['id']."&"?> method="GET">
            <div>Nombre: <input type="text" name="nombre" 
                              value="<?php echo $datos[0]; ?>"/>
            </div>
            <div>Asignatura <input type="text" name="asignatura" 
                            value="<?php echo $datos[1]; ?>"/></div>            
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>
