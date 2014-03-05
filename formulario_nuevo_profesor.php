<!DOCTYPE html>
<!--
Formulario para rellenar los datos cuando se quiere agregar un profesor a la bd
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="grabar_nuevo_profesor.php" method="post">
            <div>Introduzca los datos del nuevo profesor:</div>
            <div>Nombre: <input type="text" name="nombre"/></div>
            <div>Asignatura: <input type="text" name="asignatura"/></div>
            <div><input type=submit value="enviar"/></div>
        </form>
    </body>
</html>
