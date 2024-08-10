<?php 
include("function.php");
$id = $_GET['us_codigo'];
delete('usuarios','us_codigo',$id);
header("location:students_table.php");

?>