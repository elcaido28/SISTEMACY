<?php

	function isNull( $cedula, $nombre,  $lugarnac, $fechanac, $copiaced, $email, $telefono, $tel_convenc, $genero, $estadoc, $direccion, $foto, $pass){
		if( strlen(trim($cedula)) < 1 || strlen(trim($nombre)) < 1 || strlen(trim($lugarnac)) < 1 || strlen(trim($fechanac)) < 1 || strlen(trim($copiaced))< 1 || strlen(trim($email))< 1 || strlen(trim($telefono))< 1 || strlen(trim($tel_convenc)) < 1 || strlen(trim($genero))< 1 || strlen(trim($estadoc))< 1 || strlen(trim($direccion))< 1 || strlen(trim($foto)) < 1 || strlen(trim($pass)) )
		{
			return true;
			} else {
			return false;
		}
	}




	function isEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}

	function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}

	function minMax($min, $max, $valor){
		if(strlen(trim($valor)) < $min)
		{
			return true;
		}
		else if(strlen(trim($valor)) > $max)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function cedulaExiste($cedula)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT us_codigo FROM usuarios WHERE us_cedula = ? LIMIT 1");
		$stmt->bind_param("s", $cedula);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();

		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}

	function nombreExiste($nombre)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT us_codigo FROM usuarios WHERE us_nombre = ? LIMIT 1");
		$stmt->bind_param("s", $nombre);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();

		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}


	function emailExiste($email)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT us_codigo FROM usuarios WHERE us_email = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();

		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}

	function generateToken()
	{
		$gen = md5(uniqid(mt_rand(), false));
		return $gen;
	}

	function hashPassword($password)
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}

	function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}

	function registraUsuario($cedula, $nombre, $pass_hash, $lugarnac, $fechanac, $copiaced, $email, $telefono, $tel_convenc, $genero, $estadoc, $direccion, $foto ,  $activo, $token, $id_tipo){

		global $mysqli;

		$stmt = $mysqli->prepare("INSERT INTO usuarios ( us_cedula, us_nombre, us_clave, us_lugar_nac, us_fecha_nac, us_copia_ced, us_email, us_telefono, us_tel_convenc, us_genero, us_estadoc, us_direccion, us_foto, activacion, token, id_tipo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('sssssssssssssisi', $cedula, $nombre,  $pass_hash, $lugarnac, $fechanac, $copiaced, $email, $telefono, $tel_convenc, $genero, $estadoc, $direccion, $foto,  $activo, $token, $id_tipo );

		if ($stmt->execute()){
			return $mysqli->insert_id;
			} else {
			return 0;
		}
	}





	function validaIdToken($id, $token){
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE us_codigo = ? AND token = ? LIMIT 1");
		$stmt->bind_param("is", $id, $token);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;

		if($rows > 0) {
			$stmt->bind_result($activacion);
			$stmt->fetch();

			if($activacion == 1){
				$msg = "La cuenta ya se activo anteriormente.";
				} else {
				if(activarUsuario($id)){
					$msg = 'Cuenta activada.';
					} else {
					$msg = 'Error al Activar Cuenta';
				}
			}
			} else {
			$msg = 'No existe el registro para activar.';
		}
		return $msg;
	}

	function activarUsuario($id)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("UPDATE usuarios SET activacion=1 WHERE us_codigo = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}

	function isNullLogin($usuario, $password){
		if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function login($usuario, $password)
	{
		global $mysqli;
		//mysqli_set_charset('utf8', $mysqli);
		$stmt = $mysqli->prepare("SELECT us_codigo, id_tipo, us_clave FROM usuarios WHERE us_cedula = ? || us_email = ? LIMIT 1");
		$stmt->bind_param("ss", $usuario, $usuario);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;

		if($rows > 0) {

			if(isActivo($usuario)){

				$stmt->bind_result($id, $id_tipo, $passwd);
				$stmt->fetch();

				$validaPassw = password_verify($password, $passwd);

				if(true){

					lastSession($id);
					$_SESSION['us_codigo'] = $id;
					$_SESSION['id_tipo'] = $id_tipo;


					header("location: ../index.php");
					} else {

					$errors = "La contrase&ntilde;a es incorrecta";
				}
				} else {
				$errors = 'El usuario no esta activo, comunicarse con el administrador';
			}
			} else {
			$errors = "El numero de cedula no existe";
		}
		return $errors;
	}


	function lastSession($id)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("UPDATE usuarios SET last_session=NOW(), password_request=1 WHERE us_codigo = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->close();
	}

	function isActivo($usuario)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE us_cedula = ? || us_email = ? LIMIT 1");
		$stmt->bind_param('ss', $usuario, $usuario);
		$stmt->execute();
		$stmt->bind_result($activacion);
		$stmt->fetch();

		if ($activacion == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}





	function getValor($campo, $campoWhere, $valor)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT $campo FROM usuarios WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;

		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;
		}
	}

	function getPasswordRequest($id)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT password_request FROM usuarios WHERE us_codigo = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($_id);
		$stmt->fetch();

		if ($_id == 1)
		{
			return true;
		}
		else
		{
			return null;
		}


		function delete($tblname,$field_id,$id){

	$sql = "DELETE from ".$tblname." WHERE ".$field_id."=".$id."";

	return db_query($sql);
}

function select_id($tblname,$field_name,$field_id){
	$sql = "SELECT * from ".$tblname." WHERE ".$field_name." = ".$field_id."";
	$db=db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);

	return $sql;

}


	}
