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

// Obtener el nuevo password desde el formulario
$nuevo_password = mysqli_real_escape_string($connection, $_POST["nuevo_password"]);

// Obtener el identificador único del usuario (reemplaza 'cedula_usuario' con el campo correcto)
$cedula_usuario = mysqli_real_escape_string($connection, $_POST["cedula"]);

// Actualizar la contraseña en la tabla "registrarse" utilizando una consulta preparada
$actualizar = "UPDATE registrarse SET contraseña_usuario=? WHERE cedula_usuario=?";
$stmt = mysqli_prepare($connection, $actualizar);
mysqli_stmt_bind_param($stmt, "ss", $nuevo_password, $cedula_usuario);
mysqli_stmt_execute($stmt);

// Verificar el resultado de la consulta preparada
if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("location: ../INICIAR SESION.html");
    ?>
    <div id="mensaje" style="position: absolute; top: 18px; width: 40%; text-align: center; font-size:20px; color:green">
        <h6>La contraseña ha cambiado correctamente,</h6>
        <h6>por favor inténtelo de nuevo</h6>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById("mensaje").style.display = "none";
        }, 3000);
    </script>
    <?php
} else {
    include("REESTABLECER.html");
    ?>
    <div id="mensaje" style="position: absolute; top: 180px; width: 40%; text-align: center; font-size:20px; color:red">
        <h6>Hubo un problema al actualizar la contraseña,</h6>
        <h6>por favor inténtelo de nuevo</h6>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById("mensaje").style.display = "none";
        }, 1000);
    </script>
    <?php
}

// Cerrar la consulta preparada y la conexión
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>