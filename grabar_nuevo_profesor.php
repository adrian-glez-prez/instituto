<?php require_once 'funcionesbd.php';
//asignación de variables
$datos=Array();
$datos[0]=(isset($_REQUEST['nombre']))?
            $_REQUEST['nombre']:"";
$datos[1]=(isset($_REQUEST['asignatura']))?
            $_REQUEST['asignatura']:"";
//conexión a la bd
$db = conectaBd();
$nombre = $datos[0];
$asignatura = $datos[1];        
$consulta = "INSERT INTO profesores 
(nombre, asignatura)
VALUES (:nombre, :asignatura)";
$resultado = $db->prepare($consulta);
if ($resultado->execute(array(":nombre" => $datos[0], ":asignatura" => $datos[1]))) {
    $url = "listadoprofesores.php";
    header('Location:'.$url);
} else {
    $url = "index.php?msg_error=Error_Grabar_Nuevo_Profesor";
    header('Location:'.$url);
}
$db = null;
?>
