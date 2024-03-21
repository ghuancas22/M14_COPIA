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
    <h1>Estudiantes con Bicicleta</h1>
    <?php
        // Consulta para obtener los estudiantes que van en bicicleta
        $query = "SELECT e.IDBicicleta, e.DNI, e.Nombre, e.Apellidos, e.Direccion, e.Telefono, e.FechaNacimiento, e.NumExpediente, e.Edad, e.Email
                FROM ESTUDIANTE e
                WHERE e.IDBicicleta IS NOT NULL";

        $result = $conexion->query($query);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar encabezado de la tabla
            echo "<table cellspacing='25'>";
            echo "<tr><th>ID Bicicleta</th><th>DNI</th><th>Apellido</th><th>Nombre</th><th>Telefono</th><th>Email</th></tr>";

            // Mostrar cada fila de resultados
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IDBicicleta"] . "</td>";
                echo "<td>" . $row["DNI"] . "</td>";
                echo "<td>" . $row["Apellidos"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["Telefono"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "</tr>";
            }
            // Cerrar tabla
            echo "</table>";
        } else {
            echo "<p>No hay estudiantes que vayan en bicicleta.</p>";
        }
    ?>
</html>