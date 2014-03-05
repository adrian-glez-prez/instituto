<?php require_once 'funcionesbd.php';?>
<html>
    <head>
        <title>
            Listado de alumnos
            <meta charset="UTF-8"/>
            <meta name="viewport" content="width=device-width"/>
        </title>
    </head>
    <body>
        <div>
            Listado de los alumnos del centro en la base de datos
        </div>
        <div> Desea registrar un nuevo alumno?</div>
        <a href="formulario_nuevo_alumno.php">Si, por favor</a>
        <?php 
            $bd = conectaBd();
            $consulta = "SELECT * FROM alumnos";
            $resultado = $bd->query($consulta);
            if (!$resultado) {
                echo "Error en la consulta";
            } else {
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Nombre</th>";
                echo "<th>Curso</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "</tr>";
                foreach ($resultado as $registro) {
                    echo "<tr>";
                    echo "<td>".$registro['id']."</td>";
                    echo "<td>".$registro['nombre']."</td>";                    
                    echo "<td>".$registro['curso']."</td>";
                    echo "<td><a href=formulario_editar_alumno.php?id=".$registro['id'].">Editar</a></td>";
                    echo "<td><a href=formulario_borrar_alumno.php?id=".$registro['id'].">Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </body>
</html>