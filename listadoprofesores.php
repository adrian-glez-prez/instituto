<?php require_once 'funcionesbd.php';?>
<html>
    <head>
        <title>
            Listado de profesores
            <meta charset="UTF-8"/>
            <meta name="viewport" content="width=device-width"/>
        </title>
    </head>
    <body>
        <div>
            Listado de los profesores del centro en la base de datos
        </div>
        
               <div> Desea registrar un nuevo profesor?</div>
               <a href="formulario_nuevo_profesor.php">Si, por favor</a>
        <?php 
            $bd = conectaBd();
            $consulta = "SELECT * FROM profesores";
            $resultado = $bd->query($consulta);
            if (!$resultado) {
                echo "Error en la consulta";
            } else {
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Nombre</th>";
                echo "<th>Asignatura</th>";
                echo "</tr>";
                foreach ($resultado as $registro) {
                    echo "<tr>";
                    echo "<td>".$registro['id']."</td>";
                    echo "<td>".$registro['nombre']."</td>";                    
                    echo "<td>".$registro['asignatura']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </body>
</html>