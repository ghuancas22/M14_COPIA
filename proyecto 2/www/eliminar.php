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
    <h1>Eliminar Registros</h1>
    <?php
        // Consulta para obtener los datos de las tablas
        $query_profesor = "SELECT * FROM PROFESOR";
        $result_profesor = $conexion->query($query_profesor);

        $query_estudiante = "SELECT * FROM ESTUDIANTE";
        $result_estudiante = $conexion->query($query_estudiante);

        // Procesar el formulario de borrado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['borrar'])) {
                $borrar_ids = $_POST['borrar'];
                $tabla = $_POST['tabla'];
                foreach ($borrar_ids as $id) {
                    $borrar_registro = "DELETE FROM $tabla WHERE DNI = '$id'";
                    if ($conexion->query($borrar_registro) !== TRUE) {
                        echo '<p>Error al borrar el registro con DNI ' . $id . ': ' . $conexion->error . '</p>';
                    } else {
                        echo '<p>Registro con DNI ' . $id . ' eliminado correctamente.</p>';
                        echo '<a href="index.php"><button>Regresar al Indice</button></a>';
                    }
                }
            } else {
                echo '<p>No se han seleccionado registros para borrar.</p>';
                echo '<a href="index.php"><button>Regresar al Indice</button></a>';
            }
        }

        // Mostrar registros de la tabla "profesor"
        $consulta_profesores = "SELECT * FROM PROFESOR";
        $result_profesores = $conexion->query($consulta_profesores);

        if ($result_profesores->num_rows > 0) {
            echo '<h2>Profesores</h2>';
            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
            echo '<input type="hidden" name="tabla" value="profesor">';
            echo '<ul>';
            while ($row = $result_profesores->fetch_assoc()) {
                echo '<li>';
                echo '<label><input type="checkbox" name="borrar[]" value="' . $row['DNI'] . '"> ';
                echo $row['Nombre'] . ' ' . $row['Apellidos'] . '</label>';
                echo '</li>';
            }
            echo '</ul>';
            echo '<input type="submit" value="Borrar Profesores Seleccionados">';
            echo '</form>';
        } else {
            echo '<p>No hay datos de profesores para mostrar.</p>';
        }

         // Mostrar registros de la tabla "estudiante"
        $consulta_estudiantes = "SELECT * FROM ESTUDIANTE";
        $result_estudiantes = $conexion->query($consulta_estudiantes);

        if ($result_estudiantes->num_rows > 0) {
            echo '<h2>Estudiantes</h2>';
            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
            echo '<input type="hidden" name="tabla" value="estudiante">';
            echo '<ul>';
            while ($row = $result_estudiantes->fetch_assoc()) {
                echo '<li>';
                echo '<label><input type="checkbox" name="borrar[]" value="' . $row['DNI'] . '"> ';
                echo $row['Nombre'] . ' ' . $row['Apellidos'] . '</label>';
                echo '</li>';
            }
            echo '</ul>';
            echo '<input type="submit" value="Borrar Estudiantes Seleccionados">';
            echo '</form>';
        } else {
            echo '<p>No hay datos de estudiantes para mostrar.</p>';
        }

    ?>
</html>