<?php
// Datos de conexión al servidor
$user = "id21473769_gisell";
$pass = "Alejandrogisell16@";
$host = "localhost";

// Crear una conexión a la base de datos
$connection = mysqli_connect($host, $user, $pass);

// Verificar la conexión a la base de datos
if (!$connection) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Indicar el nombre de la base de datos
$datab = "id21473769_takecarewithusga";

// Seleccionar la base de datos
if (!mysqli_select_db($connection, $datab)) {
    die("Error al seleccionar la base de datos: " . mysqli_error($connection));
}

// Recuperar valores del formulario y escaparlos
$email1 = mysqli_real_escape_string($connection, $_POST['email1']);

session_start();
$_SESSION['email1'] = $email1;

// Consulta de autenticación
$consulta = "SELECT * FROM registrarse WHERE correo_usuario = '$email1'";
$resultado = mysqli_query($connection, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    header("location: ../REESTABLECER.html");
} else {
    include("CONTRASEÑA.html");
    ?>
    <div id="mensaje" style="position : absolute; top: 180px; width: 40%; text-align: center; font-size:20px; color:red">
        <h6>El correo está mal diligenciado,</h6><h6>por favor inténtelo de nuevo</h6>
    </div>
    <script>
        setTimeout(function(){
            document.getElementById("mensaje").style.display = "none";
        }, 1000);
    </script>
    <?php
}

// Cerrar la conexión a la base de datos
mysqli_free_result($resultado);
mysqli_close($connection);
?>