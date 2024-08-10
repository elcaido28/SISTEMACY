<?php
//session_start(); //Iniciar una nueva sesión o reanudar la existente

  $page_title = 'Cambiar contraseña';
  //require_once('funcs/load.php');
  // Checkin What level user has permission to view this page
$con=mysqli_connect("localhost","root","","bd_cooperativa") or die("Error al conectar " . mysqli_error());
?>

<?php
  if(isset($_POST['update'])){

    if(empty($errors)){
      $usuari=$_POST['txcedula'];
      $new_pass=$_POST['new-password'];
      $consu=mysqli_query($con,"SELECT * FROM usuarios where us_cedula='$usuari'");
      $row=mysqli_fetch_array($consu);
       $codigo_usu=$row['us_codigo'];
       $email_usu=$row['us_cedula'];

		             //if(sha1($_POST['old-password']) !== current_user()['us_clave'] ){
              if($codigo_usu!=""){
                // $new = password_hash($new_pass,PASSWORD_DEFAULT); //FUNCION PARA CAMBIA LA CLAVE Y TRANSFORMAR
                // $result = mysqli_query($con,"UPDATE usuario SET us_clave='$new' where us_codigo='$codigo_usu'");

                $result =mysqli_query($con,"SELECT * FROM usuarios where us_cedula='$usuari'");
             }else{
               $session->msg('d', "Tu número de cédula no coincide");
               redirect('recupera1.php',false);
             }





                if($result):
                  //$session->logout();
                  //$session->msg('s',"Inicia sesión con tu nueva contraseña.");
                  //include('email/index.php');            	                            		?>
          		//<script type="text/javascript">
          			alert("Cambio de contraseña Exitoso");

          			window.location.href = "index.php";
          		</script>
          		<?php
                  //redirect('index.php', false);
                else:
                  $session->msg('d',' Lo siento, actualización falló.');
                  redirect('recupera1.php', false);
                endif;
    } else {
      $session->msg("d", $errors);
      redirect('recupera1.php',false);
    }
  }
?>

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

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cambiar Contraseña</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/key.gif"/>
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

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/logo.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form id="loginform" class="clearfix" class="login100-form validate-form" action="recupera1.php" method="POST" autocomplete="off">

                      <span class="login100-form-title p-b-49">
                        <h3>Cambiar Contraseña</h3>


                    </span>

                    <div align="center">

                      <p>&nbsp;</p>
                  </div>


                  

                  <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Cédula</span>
						<input class="input100" type="text" name="txcedula" placeholder="Cedula" onkeypress="return solonumeros(event)"  >
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

                    <div  class="wrap-input100 validate-input" data-validate="Password is required">
						<span for="newPassword" class="label-input100"> Nueva Contraseña</span>
						<input class="input100" type="password" name="new-password" placeholder=" Nueva Contraseña" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

						<br>




					<br>





					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div value="<?php echo (int)$user['us_cedula'];?>" class="login100-form-bgbtn"></div>
							<button type="submit" name="update"  class="login100-form-btn">
								Cambio Clave
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<b>
						<a href="index.php">
							 Iniciar Sesión
						</a>
					</b>
					</div>

					<div class="txt1 text-center p-t-3 p-b-5">
						<b>

						<a align= " center" href="index.php">
							 Cancelar
						</a>
					</b>
					</div>





				</form>


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
