<?php
// Validamos datos del servidor
$user = "id21473769_gisell";
$pass = "Alejandrogisell16@";
$host = "localhost";

// Conexión a la base de datos
$connection = mysqli_connect($host, $user, $pass);

// Verificamos la conexión a la base de datos
if ($connection) {
    
    
} else {
     
    
}

// Indicamos el nombre de la base de datos
$datab = "id21473769_takecarewithusga";

// Seleccionamos la base de datos
$db = mysqli_select_db($connection, $datab);

if ($db) {
    
} else {
    
}

$cedula1 = mysqli_real_escape_string($connection, $_POST["ced"]);
$nombre1 = mysqli_real_escape_string($connection, $_POST["nam"]);
$apellido1 = mysqli_real_escape_string($connection, $_POST["apel"]);
$correo1 = mysqli_real_escape_string($connection, $_POST["email"]);
$telefono1 = mysqli_real_escape_string($connection, $_POST["tele"]);


$instruccion_SQL = "INSERT INTO paciente (id_paciente, nombre_paciente, apellido_paciente, correo_paciente, celular_paciente) 
VALUES ('$cedula1', '$nombre1', '$apellido1', '$correo1', '$telefono1')";

$resultado = mysqli_query($connection, $instruccion_SQL); 

// Cierra la conexión y libera el resultado
mysqli_close($connection);
?>