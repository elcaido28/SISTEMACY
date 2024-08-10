<?php

header('Content-Type:text/html; charset=UTF-8');


    session_start();
    require 'funcs/conexion.php';
    require 'funcs/funcs.php';
    include("funcs/conexion1.php");


    //$conexion=mysqli_connect('localhost','root','','bd_cooperativa');


    function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}



    if(!isset($_SESSION["id_tipo"])){ //Si no ha iniciado sesión redirecciona a index.php
        header("Location: login/index.php");
    }

    $idUsuario = $_SESSION['id_tipo'];
     $idpis = $_SESSION['us_codigo'];


$sql1 = "SELECT us_codigo,   us_nombre, us_apellido, us_email, id_tipo FROM usuarios where us_codigo=$idpis";

     $resultado1 = $mysqli->query($sql1);



     $row = $resultado1->fetch_assoc();



?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Administrar Usuarios</title>
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

    <link href="css/print.css" rel="stylesheet" media="print">


    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="http://c.fzilla.com/1286136086-jquery.js"></script>
    <script type="text/javascript" src= "http://c.fzilla.com/1291523190-jpaginate.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/DT_bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="vendors/jGrowl/jquery.jgrowl.css" media="screen">
     <link rel="stylesheet" type="text/css" href="vendors/jGrowl/jquery.jgrowl.js" media="screen">
     <script src="vendor/easy-pie-chart-master/src/easypiechart.js"></script>

    <script type="text/javascript" href="js/table.js"></script>

    <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">

   <link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.3.1.js"> 
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">





<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/foundation.min.css">





 <link rel="stylesheet" href="jquery.dataTables.min.css">

 <script src="~/Scripts/jquery-2.1.1.js"></script>
<script src="~/Scripts/jquery.tablesorter.js"></script>
<script src="~/Scripts/jquery.tablesorter.pager.js"></script>

<script>
$(document).ready(function () {
$("#dt_basic")
.tablesorter({ widthFixed: true, widgets: ["zebra"] })
.tablesorterPager({ container: $("#pager") });
});

</script>

<script type="text/javascript">
   $(document).ready(function() {
    $('#content').jPaginate();
} );
</script>
<!--Cargamos jquery localmente
<script src="RUTA/A/jquery-2.1.1.min.js"></script>-->


    <script type="text/javascript">
        function confirmDelete() {
            var confirmar = confirm("¿Realmente desea eliminarlo? ");
            if (confirmar) {
                return true;
            } else {
                return false;
            }
        }


        function confirmBloquear() {
            var confirmar = confirm("¿Realmente desea bloquear al usuario? ");
            if (confirmar) {
                return true;
            } else {
                return false;
            }
        }
    </script>

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
            <li class="nav-item active"><a href="administrar_usuarios.php" class="nav-link">Usuarios</a></li>
            <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
            
            <li class="nav-item"><a href="contactenos.php" class="nav-link">Contactenos</a></li>
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
             
          </div>
        </div>
        
     

           <?php
    include("function.php");

?>
    <div id="content">

              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading" ><h2 align="center" >Mantenimiento de Usuarios</h2></div>

                    <br>



                    <div class="panel-body">
                      <div class="responsive-table">
                        
                        <br>
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            
                      </thead>
                      <tbody>
                       <div class="container-fluid">
            <div class="row-fluid">
        
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
            <?php
                         require_once 'dbcon.php';
              $query= mysqli_query($connection,"SELECT  usuarios.us_codigo, usuarios.us_cedula,  usuarios.us_nombre, usuarios.us_apellido, usuarios.us_email, usuarios.activacion, tipo_usuario.tipo FROM usuarios INNER JOIN tipo_usuario ON usuarios.id_tipo = tipo_usuario.id_tipo ")or die(mysqli_error());
              $count = mysqli_num_rows($query);
              
            ?>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Lista de Usuarios</div>
                                <div class="muted pull-right">
                  Numero de Usuarios: <span class="badge badge-info"><?php  echo $count;  ?></span>
                </div>
                            </div>
                            <div class="block-content collapse in">
                <div class="span12" id="studentTableDiv">
                <h2 id="noch">Lista de Usuarios</h2>
                  
                               <?php include('students_table.php'); ?>
                        <!-- /block -->
                        </div>
                            </div>
                        </div>

                    <?php include('script.php'); ?>


                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            </div>
                </div>
            </div>
    
        </div>


    


    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          
          </div>
          
          
          
          
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
	
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos reservados | Cooperativa de Transporte 
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

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
  <script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>
 <script type="text/javascript" src="vendors/datatables/js/query.dataTables.min.js"></script>
    <script type="text/javascript" src= "assets/DT_bootstrap.js"></script>
    
    <script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->
<script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
  </body>
</html>