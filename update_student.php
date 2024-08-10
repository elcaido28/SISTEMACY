<?php
		include('dbcon.php');
		
		
		$us_codigo = $_POST['us_codigo'];
		$us_cedula = $_POST['us_cedula'];
		$us_nombre = $_POST['us_nombre'];
		$us_apellido = $_POST['us_apellido'];
		$us_lugar_nac = $_POST['us_lugar_nac'];
		$us_fecha_nac = $_POST['us_fecha_nac'];
		$us_copia_ced = $_POST['us_copia_ced'];
		$us_email = $_POST['us_email'];
		$us_telefono = $_POST['us_telefono'];
		$us_genero = $_POST['us_genero'];
		$us_direccion = $_POST['us_direccion'];
		$us_foto = $_POST['us_foto'];
		$tipo = $_POST['id_tipo'];
		
		mysqli_query($connection,"update usuarios set us_cedula = '$us_cedula', us_nombre = '$us_nombre', us_apellido ='$us_apellido',
			us_lugar_nac='$us_lugar_nac',
			us_fecha_nac = '$us_fecha_nac',
			us_copia_ced = '$us_copia_ced',
			us_email ='$us_email',
			us_telefono ='$us_telefono',
			us_genero ='$us_genero',
			us_direccion ='$us_direccion',
			us_foto = '$us_foto',
			id_tipo = '$tipo', 
				 
		
		where us_codigo = '$us_codigo'
		")or die(mysqli_error());
		
		
		
		
		