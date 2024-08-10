<?php
include('conexion.php');
if((isset($_POST['name']) && !empty($_POST['name']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['subject']) && !empty($_POST['subject']))){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  
  $to = "merchanjoselyne@gmail.com";
  $headers = "From : " . $email;
  if( mail($to, $subject, $message, $headers)){
  $query = "INSERT INTO `contactenos` (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $result = mysqli_query($connection, $query);
    //echo "<center>E-Mail Enviado con exito, nos pondremos en contacto con usted pronto.</center>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contáctenos</title>
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
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">

              <ul class="nav navbar-nav navbar-right user-nav">

                <li class="user-name"><span ><?php echo utf8_decode(" Bienvenido, ".  $row['us_nombre'].' '.$row['us_apellido']) ; ?>



                  <li class="dropdown avatar-dropdown">
                   <img src="images/sort-down.png"  class="img-circle avatar" height="30px" width="30px"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">

                     <li class="more">
                      
                      <ul>

                        

                        <a href="login/logout.php"><span class="fa fa-power-off " style="color: #000">  Cerrar Sesión</span></a> </right>
                      </ul>
                    </li>
                  </ul>
                </li>
                </span></li>

              </ul>
          
          <ul class="navbar-nav ml-auto">
            <li class="nav-item "><a href="index.php" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="noticias.php" class="nav-link">Noticias</a></li>
            <li class="nav-item"><a href="administrar_usuarios.php" class="nav-link">Usuarios</a></li>
            <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="properties.html" class="nav-link">Properties</a></li>
            <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
            <li class="nav-item active"><a href="contactenos.php" class="nav-link">Contactenos</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/foto.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
            
          </div>
        </div>
      </div>
      <div class="mouse">
        <a href="#" class="mouse-icon">
          <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
        </a>
      </div>
    </div>
     
     
    

    <section class="ftco-section goto-here">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">COOPERATIVA 13 DE AGOSTO</span>
            <b><h2 class="mb-4">Cooperativa De Transporte Escolar E Institucional   “13 de Agosto” <br></h2></b>
            <b> <h3>Contáctenos</h3></b>
          </div>
        </div>
        

		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info justify-content-center">
        	<div class="col-md-8">
        		<div class="row mb-5">
		          <div class="col-md-4 text-center py-4">
		          	<div class="icon">
		          		<span class="icon-map-o"></span>
		          	</div>
		            <p><span>Dirección:</span> Urbanización Las Orquídeas  Mz 75 Solar 41</p>
              </div>
              <div class="col-md-4 text-center border-height py-4">
                <div class="icon">
                  <span class="icon-mobile-phone"></span>
                </div>
                <p><span>Teléfono:</span> <a href="tel://1234567920">2543792 - 0993679227 - 0994692543</a></p>
              </div>
              <div class="col-md-4 text-center py-4">
                <div class="icon">
                  <span class="icon-envelope-o"></span>
                </div>
                <p><span>Email:</span> <a href="mailto:info@yoursite.com">coop13deagosto@hotmail.com</a></p>
		          </div>
		        </div>
          </div>
        </div>
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
            <h2 class="text-center">Si tienes alguna pregunta <br>por favor no dudes en contactarnos</h2>
            <form method="POST" class="bg-light p-5 contact-form">
              <div class="form-group">
                <label for="inputName" class="sr-only">Nombres</label>
                <input type="name" name="name" class="form-control" id="inputName" placeholder="Nombre">
              </div>
              <div class="form-group">
                <label for="inputEmail" class="sr-only">E-Mail</label>
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="inputSubject" class="sr-only">Asunto</label>
                <input type="name" name="subject" class="form-control" id="inputSubject" placeholder="Asunto">
              </div>
              <div class="form-group">
                <label for="inputMessage" class="sr-only">Mensaje</label>
                <textarea name="message" id="" cols="30" rows="7" class="form-control" id="inputMessage" placeholder="Mensaje"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Enviar Mensaje" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>
        
      </div>
    </section>

    
    
  

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
    
  </body>
</html>