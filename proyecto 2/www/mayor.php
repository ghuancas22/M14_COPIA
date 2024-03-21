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
    <h1>Estudiantes mayores de 30 años</h1>
    <?php
    // Consulta para obtener los estudiantes mayores de 30 años y ordenarlos de menor a mayor edad
        $query = "SELECT * FROM ESTUDIANTE WHERE Edad > 30 ORDER BY Edad ASC";
        $result = $conexion->query($query);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar encabezado de la tabla
            echo "<h2>(ordenados de menor a mayor)</h2>";
            echo "<table cellspacing='25''>";
            echo "<tr><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>Edad</th></tr>";

            // Mostrar cada fila de resultados
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["DNI"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["Apellidos"] . "</td>";
                echo "<td>" . $row["Direccion"] . "</td>";
                echo "<td>" . $row["Edad"] . "</td>";
                echo "</tr>";
            }

            // Cerrar tabla
            echo "</table>";
        } else {
            echo "<p>No hay estudiantes mayores de 30 años.</p>";
        }
    ?>