<!DOCTYPE html>
<!--
Formulario para rellenar los datos cuando se quiere agregar un alumno a la bd
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="grabar_nuevo_alumno.php" method="post">
            <div>Introduzca los datos del nuevo alumno:</div>
            <div>Nombre: <input type="text" name="nombre"/></div>
            <div>Asignatura: <input type="text" name="curso"/></div>
            <div><input type=submit value="enviar"/></div>
        </form>
    </body>
</html>
