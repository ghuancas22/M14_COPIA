<?php 
$host = "mysql";  
$database = "bbdduniversitat"; 
$user = "root"; 
$password = "123"; 
$conexion = mysqli_connect($host, $user, $password,$database); 

if (!$conexion)   die("No ha podido realizarse la conexión".mysqli_connect_error()); 
?>
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  padding: 10px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  text-align: center;
  background: white;
}

.header h1 {
  font-size: 50px;
  color:#1f0469
}
/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #1f0469;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: #1f0469;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
    margin: 0 auto; /* Centrar el div */
    width: 75%;
}

/* Fake image */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}

/* Add a card effect for articles */
.card {
    background-color: white;
    padding: 20px;
    margin-top: 20px;
}

/* Clear floats after the columns */
.row::after {
    content: "";
    display: table;
    clear: both;
}
h2 h1 {
    text-align: center;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
.bbdd {
    display: inline-block;
    margin: 10px;
    background-color: whitesmoke;
    border: 1px solid #1f0469;
    padding-block: 5px;
    padding-right: 5px;
    padding-left: 5px;
}
</style>
<script>
// Función para cargar el contenido PHP en el div leftcolumn
function cargarContenido(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("leftcolumn").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
</script>
</head>
<body>

<div class="header">
    <h1>BBDD Universidad</h1>
    <p>Selecciona las consultas</p>
</div>

<div class="topnav">
    <a href="index.php">Mostrar BBDD</a>
    <a href="#" onclick="cargarContenido('profesores.php')">Profesores</a>
    <a href="#" onclick="cargarContenido('estudiantes.php')">Estudiantes con Bicicleta</a>
    <a href="#" onclick="cargarContenido('mayor.php')">Estudiantes de 30+</a>
    <a href="#" onclick="cargarContenido('eliminar.php')">Eliminar registros</a>
</div>

<div class="row">
    <div class="card">
        <div id="leftcolumn" class="leftcolumn">
            <div class="card">
            <h1>Datos de la BBDD</h1>
            <?php
            // Consulta para obtener los datos de las tablas
                $query_profesor = "SELECT * FROM PROFESOR";
                $result_profesor = $conexion->query($query_profesor);

                $query_estudiante = "SELECT * FROM ESTUDIANTE";
                $result_estudiante = $conexion->query($query_estudiante);


                // Mostrar resultados de la tabla PROFESOR
                if ($result_profesor->num_rows > 0) {
                    echo '<h2>Total de filas en la tabla profesor: ' . $result_profesor->num_rows . '</h2>';
                    while ($row_profesor = $result_profesor->fetch_assoc()) {
                        echo '<div class="bbdd">';
                        echo 'DNI: ' . $row_profesor['DNI'] . '<br>';
                        echo 'Nombre: ' . $row_profesor['Nombre'] . '<br>'; 
                        echo 'Apellidos: ' . $row_profesor['Apellidos'] . '<br>';
                        echo 'Direccion: ' . $row_profesor['Direccion'] . '<br>'; 
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay datos en la tabla profesor.</p>';
                }

                // Mostrar resultados de la tabla ESTUDIANTE
                if ($result_estudiante->num_rows > 0) {
                    echo '<h2>Total de filas en la tabla estudiante: ' . $result_estudiante->num_rows . '</h2>';
                    while ($row_estudiante = $result_estudiante->fetch_assoc()) {
                        echo '<div class="bbdd">';
                        echo 'DNI: ' . $row_estudiante['DNI'] . '<br>';
                        echo 'Nombre: ' . $row_estudiante['Nombre'] . '<br>'; 
                        echo 'Apellidos: ' . $row_estudiante['Apellidos'] . '<br>'; 
                        echo 'Direccion: ' . $row_estudiante['Direccion'] . '<br>'; 
                        echo 'Telefono: ' . $row_estudiante['Telefono'] . '<br>';
                        echo 'Fecha de Nacimiento: ' . $row_estudiante['FechaNacimiento'] . '<br>';
                        echo 'NumExpedient: ' . $row_estudiante['NumExpediente'] . '<br>';
                        echo 'IDBicicleta: ' . $row_estudiante['IDBicicleta'] . '<br>'; 
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay datos en la tabla estudiante.</p>';
                }
                ?>
        </div>
    </div>
</div>
</body>
</html>

