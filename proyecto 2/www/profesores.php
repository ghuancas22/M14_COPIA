<?php 
$host = "mysql"; 
$database = "bbdduniversitat"; 
$user = "root"; 
$password = "123"; 
$conexion = mysqli_connect($host, $user, $password,$database); 
if (!$conexion)   die("No ha podido realizarse la conexión".mysqli_connect_error()); 
?>
<html>
<body>
    <h1>Profesores de longitud de 7 o más letras</h1>
    <?php
        // Consulta para obtener los profesores cuyo nombre tiene una longitud de 7 letras o más
        $query = "SELECT * FROM PROFESOR WHERE LENGTH(Nombre) >= 7";
        $result = $conexion->query($query);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar encabezado de la tabla
            echo "<table cellspacing='25'>";
            echo "<tr><th>DNI</th><th>Nombre</th><th>Apellidos</th></tr>";

            // Mostrar cada fila de resultados
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["DNI"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["Apellidos"] . "</td>";
                echo "</tr>";
            }

            // Cerrar tabla
            echo "</table>";
        } else {
            echo "<p>No hay profesores con nombre de 7 letras o más.</p>";
        }

    ?>
</html>