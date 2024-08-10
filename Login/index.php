<?php
	session_start(); //Iniciar una nueva sesión o reanudar la existente
	require '../funcs/conexion.php';
	require '../funcs/funcs.php';



	if(isset($_SESSION["us_cedula"])){ //En caso de existir la sesión redireccionamos
		header("Location:../index.php");
	}
	$errors = array();


	if(!empty($_POST))
	{
		$usuario = $mysqli->real_escape_string($_POST['txcedula']);
		$password = $mysqli->real_escape_string($_POST['txclave']);

		if(isNullLogin($usuario, $password))
		{
			$errors[] = "Debe llenar todos los campos";
		}

		$errors[] = login($usuario, $password);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iniciar Sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<script>
    function solonumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " 0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form id="loginform" class="login100-form validate-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
					<span class="login100-form-title p-b-49">
						Iniciar Sesión
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Cédula es reauired">
						<span class="label-input100">Cédula</span>
						<input class="input100" type="text" name="txcedula" placeholder="Cédula" onkeypress="return solonumeros(event)" maxlength="10">
						<span class="focus-input100" data-symbol="&#xf201;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password es required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="txclave" placeholder="Password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<span >
							¿Se te olvidó tu
							</span>
						<b><a href="recupera1.php">
							 Contraseña?
						</a></b>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-54 p-b-20">
						<span >
								No tienes una cuenta
							</span>
						<b><a href="../registro/index.php">
							 Registrate?
						</a></b>
					</div>

					

					
				</form>

				<?php echo resultBlock($errors); ?>

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>