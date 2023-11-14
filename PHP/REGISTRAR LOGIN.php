<?php
// Validamos datos del servidor
$user = "id21473769_gisell";
$pass = "Alejandrogisell16@";
$host = "localhost";

// Conexión a la base de datos
$connection = mysqli_connect($host, $user, $pass);

// Verificamos la conexión a la base de datos
if (!$connection) {
    
} else {
    
}

// Indicamos el nombre de la base de datos
$datab = "id21473769_takecarewithusga";

// Seleccionamos la base de datos
$db = mysqli_select_db($connection, $datab);

if (!$db) {
    
} else {
    
}

// Recuperamos los valores del formulario
$cedula = mysqli_real_escape_string($connection, $_POST["ced"]);
$nombre = mysqli_real_escape_string($connection, $_POST["nam"]);
$apellido = mysqli_real_escape_string($connection, $_POST["apel"]);
$correo = mysqli_real_escape_string($connection, $_POST["email"]);
$telefono = mysqli_real_escape_string($connection, $_POST["tele"]);
$contraseña = mysqli_real_escape_string($connection, $_POST["password"]);

// Consulta de inserción SQL
$instruccion_SQL = "INSERT INTO registrarse (cedula_usuario, nombre_usuario, apellido_usuario, correo_usuario, telefono_usuario, contraseña_usuario) 
VALUES ('$cedula', '$nombre', '$apellido', '$correo', '$telefono', '$contraseña')";

$resultado = mysqli_query($connection, $instruccion_SQL);

if ($resultado->num_rows > 0) {
    header("location: ../PACIENTE.php");
} else {
    include("INICIAR SESION.html");
    echo"<h1>ESTA MAL</h1>";
}
// Cierra la conexión y libera el resultado
mysqli_close($connection);
?>