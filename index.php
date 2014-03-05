<!DOCTYPE html>
<!--
Inicio, permite ir a la tabla de alumnos o a la de profesores
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Bienvenido! quieres ver una lista de los profesores o de los alumnos?
        <form action="listadoprofesores.php" method="POST">
            <input type="submit" value="profesores"/>
        </form>
        <form action="listadoalumnos.php" method="POST">
            <input type="submit" value="alumnos"/>
        </form>
    </body>
</html>
