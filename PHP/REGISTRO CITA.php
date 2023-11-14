<?php
// Validamos datos del servidor
$user = "id21473769_gisell";
$pass = "Alejandrogisell16@";
$host = "localhost";

// Conexión a la base de datos
$connection = mysqli_connect($host, $user, $pass);

// Verificamos la conexión a la base de datos
if (!$connection) {
    include("INICIAR SESION.html");
    
} else {
     include("INICIAR SESION.html");
    
}

// Indicamos el nombre de la base de datos
$datab = "id21473769_takecarewithusga";

// Seleccionamos la base de datos
$db = mysqli_select_db($connection, $datab);

if (!$db) {
    
} else {
    
}

// Recuperamos los valores del formulario
$fech = mysqli_real_escape_string($connection, $_POST["fech"]);
$Hor = mysqli_real_escape_string($connection, $_POST["Hor"]);
$Cit = mysqli_real_escape_string($connection, $_POST["Cit"]);
$ced1 = mysqli_real_escape_string($connection, $_POST["ced1"]);
$Doc = mysqli_real_escape_string($connection, $_POST["Doc"]);

// Consulta de inserción SQL
$instruccion_SQL = "INSERT INTO citas (fecha_cita, hora_cita, iden_categ, iden_pacien, iden_medic) 
VALUES ('$fech', '$Hor', '$Cit', '$Ced1', '$dDoc')";

$resultado = mysqli_query($connection, $instruccion_SQL);

if($resultado){
    include("comprobar.php");  
} 
else{
    include("AGENDAR.html")
    ?>
    <div id="mesanje" style="position : absolute; top: 180px;with: 40%;text-align: center;font-size:20px;color:red">
        <h6>Hubo un problema en el registro,</h6><h6>por favor intente de nuevo</h6>
    </div>
    <script>
        setTimeout(function(){
            document.getElementById("mesanje").style.display = "none";
        }, 1000);
        
    </script>
    <?php  
} 
// Cierra la conexión y libera el resultado
mysqli_close($connection);
?>