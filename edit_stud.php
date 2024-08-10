<?php $get_id = $_GET['us_codigo']; ?>	

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">



    	<link href="images/logo.png" rel="icon" type="image">
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/my_style.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/print.css" rel="stylesheet" media="print">
			<link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
			<link href="assets/styles.css" rel="stylesheet" media="screen">
			<script src="vendors/jquery-1.9.1.min.js"></script>
			<!-- data table -->
			<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
			<!-- notification  -->
			<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
			<script src="vendors/jGrowl/jquery.jgrowl.js"></script>
			<script src="vendor/easy-pie-chart-master/src/easypiechart.js"></script>
			
			<title>Sistema Inscripci&#243;n - Platea21 </title>
			
			<link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
		
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>



    
  </head>
  

    <body>
		
		
        <div class="container-fluid">
            <div class="row-fluid">
				
				
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <br>
                        <br>
                        <br>
                        <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Editar Usuario</div>
                                <div class="muted pull-right"><a href="administrar_usuarios.php"><i class="icon-arrow-left icon-large"></i> Volver</a></div>
                            </div>

                            <?php //$get_id = $_GET['us_codigo'];

	 //require 'funcs/conexion.php';
	  include('dbcon.php'); 
	//$conexion=mysqli_connect('localhost','root','','bd_cooperativa');
	 ?>
                            
						<?php
						$query = mysqli_query($connection,"select * FROM usuarios  where us_codigo = '$get_id'") or die(mysql_error());
						$row = mysqli_fetch_array($query);
						?>
						<form id="update_student" class="form-signin" method="post">
						<!-- span 4 -->
										<div class="span4">
										<input type="hidden" value="<?php echo $row['us_codigo']; ?>" class="input-block-level"  name="us_codigo" required>
										<label>Cédula:</label>
											<input type="text" class="input-block-level"  name="us_cedula" value="<?php echo $row['us_cedula']; ?>" required>
										<label>Tipo Usuario:</label>		
									<select name="tipo" class="span5" required>
									
										<?php 
											$result = mysqli_query($connection,"SELECT * from tipo_usuario ")or die(mysql_error());
											while($row1 = mysqli_fetch_array($result)){
											$myclass = $row1['tipo'];			
									     ?>
								<option value="<?php echo $myclass;?>"> <?php echo $myclass;?> </option>
									<?php }?>
							</select>
										<label>Nombres:</label>
											<input type="text" class="input-block-level"  name="us_nombre" value="<?php echo $row['us_nombre']; ?>" required>
											
											<label>Apellidos:</label>
											<input type="text" class="input-block-level"  name="us_apellido"  value="<?php echo $row['us_apellido']; ?>"  required>
											<label>Genero:</label>
												<select name="us_genero" class="span5" required>
													<option><?php echo $row['us_genero']; ?></option>
													<option>Masculino</option>
													<option>FeMasculino</option>
												</select>
										</div>		
						<div class="span4">
							<label>Lugar de Nacimiento:</label>
									<input type="text" class="input-block-level"  name="us_lugar_nac" value="<?php echo $row['us_lugar_nac']; ?>">
							<label>Fecha de Nacimiento:</label>
									<input type="date" class="input-block-level"  name="us_fecha_nac" value="<?php echo $row['us_fecha_nac']; ?>">
							<label>Direccion:</label>
									<input type="text" value="<?php echo $row['us_direccion']; ?>" name="us_direccion" class="my_message" required>
							
							
										
									<label>Email:</label>
											<input type="email" value="<?php echo $row['us_email']; ?>" name="us_email" class="my_message">

									
									
									<br>
									
						</div>
						<!--end span 4 -->	
						<!-- span 4 -->	
						<div class="span4">
							<label>Foto:</label>
							<input type="text" class="input-block-level"  name="us_foto" value="<?php echo $row['us_foto']; ?>" required>
							<label>Copia de Cédula:</label>
							<input type="text" class="input-block-level"  name="us_copia_ced" value="<?php echo $row['us_copia_ced']; ?>" required>
							
							<label>Telefono:</label>
							<input type="text" class="input-block-level"  name="us_telefono" value="<?php echo $row['us_telefono']; ?>" onkeydown='return(event.which >= 48 && event.which <= 57)
											|| event.which ==8 || event.which == 46' maxlength ="10" required>
						</div>

						<br>
							<button class="btn btn-success" name="update"><i class="icon-save icon-large"></i> Actualizar</button>
						<!--end span 4 -->
						<div class="span12"><hr></div>		
							</form>			
								<script>
									jQuery(document).ready(function($){
										$("#update_student").submit(function(e){
											e.preventDefault();
											var _this = $(e.target);
											var formData = $(this).serialize();
											$.ajax({
												type: "POST",
												url: "update_student.php",
												data: formData,
												success: function(html){
													$.jGrowl("Usuario editado correctamente", { header: 'Editando Usuario' });
													window.location = 'administrar_usuarios.php';
												}
											});
										});
									});
								</script>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    

<link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>


		
	    <link href="css/bootstrap.css" rel="stylesheet" />
		<link rel="stylesheet" href="default/style.css">
  		<script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
  		<script src="js/bootstrap.js" type="text/javascript"></script>


    
  </body>
</html>