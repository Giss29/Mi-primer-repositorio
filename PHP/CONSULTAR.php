<?php
// Datos de conexión al servidor
$user = "id21473769_gisell";
$pass = "Alejandrogisell16@";
$host = "localhost";

// Crear una conexión a la base de datos
$connection = mysqli_connect($host, $user, $pass);

// Verificar la conexión a la base de datos
if (!$connection) {
   
}

// Indicar el nombre de la base de datos
$datab = "id21473769_takecarewithusga";

// Seleccionar la base de datos
if (!mysqli_select_db($connection, $datab)) {
    
}

// Recuperar valores del formulario y escaparlos
$email = mysqli_real_escape_string($connection, $_POST['email1']);
$password = mysqli_real_escape_string($connection, $_POST['password1']);

session_start();
$_SESSION['email1'] = $email;

// Consulta de autenticación
$consulta = "SELECT * FROM registrarse WHERE correo_usuario = '$email' AND contraseña_usuario = '$password'";
$resultado = mysqli_query($connection, $consulta);

if ($resultado->num_rows > 0) {
    header("location: ../index2.html");
} else {
    include("INICIAR SESION.html");
    ?>
    <div id="mesanje" style="position : absolute; top: 180px;with: 40%;text-align: center;font-size:20px;color:red">
        <h6>La contraseña o correo estan mal diligenciados,</h6><h6>por favor intente de nuevo</h6>
    </div>
    <script>
        setTimeout(function(){
            document.getElementById("mesanje").style.display = "none";
        }, 1000);
        
    </script>
    <?php
}

// Cerrar la conexión a la base de datos
mysqli_free_result($resultado);
mysqli_close($connection);
?>