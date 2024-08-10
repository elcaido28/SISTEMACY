<?php
$host="localhost";
$username="root";
$password="";
$db="bd_cooperativa";
$con=mysql_connect($host,$username,$password) or die("No se puede acceder a la base de datos");
mysql_select_db($db,$con);
?>