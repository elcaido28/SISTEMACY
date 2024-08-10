<?php

	$mysqli = new mysqli("localhost","root","","bd_cooperativa"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$con = mysqli_connect("localhost","root","","bd_cooperativa");

	//$mysqli -> set_charset("utf8");





	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();

		exit();
	}

?>
