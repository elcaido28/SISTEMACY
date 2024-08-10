<?php
$connection = mysqli_connect('localhost', 'root', '', 'bd_cooperativa');
if (!$connection){
    die("Fallo la conexion con la base de datos" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'bd_cooperativa');
if (!$select_db){
    die("Database seleccionada ha fallado" . mysqli_error($connection));
}
?>