<?php

header('Content-Type:text/html; charset=UTF-8');


    session_start();
    require 'funcs/conexion.php';
    require 'funcs/funcs.php';
    include("funcs/conexion1.php");


    function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}
  



    //if(!isset($_SESSION["id_tipo"])){ //Si no ha iniciado sesión redirecciona a index.php
       // header("Location: ../index.php");
    //}

   // $idUsuario = $_SESSION['id_tipo'];
    // $idpis = $_SESSION['us_codigo'];


//$sql1 = "SELECT us_codigo,  us_user, us_nombre, us_email, id_tipo FROM usuario where us_codigo=$idpis";

    // $resultado1 = $mysqli->query($sql1);




?>

<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Usuario</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">


</head>
<body>
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header"> <a class="navbar-brand" href="" title='Inicio' target="_blank"></a> </div>
  </div>
</div>
<div class="col-md-100 padding-30 text-center">
              <div class="col-md-40 padding-0">
                <div class="col-md-20">
                  <div class="panel">
                      
                          
                      

                </div>
              </div>

              <div class="col-md-12">
                  <div class="panel">
                      <div class="panel-heading">
                        <br>
                        <br>
                        <h2>Editar Usuario</h2>
                      </div>


                      <div class="panel-body">
  <div class="clearfix"></div>

<script>
        function validarformulario(){

          var correo;
          
          correo=document.getElementById('us_email').value;
         
          expresion= /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

            if (!expresion.test(email.value)){ 
                $("span").html('<span>Please enter a valid email address</span>');
                 return false
               }
        }
      </script>


  <?php 
include("function.php");
$id = $_GET['us_codigo'];
select_id('usuario','us_codigo',$id);
?>


  <form action="" method="post"  >
     
   
    <table class="table table-bordered table-responsive">
      

    	

      <tr>
        <td><label class="control-label">Cédula.</label></td>
        <td><input class="form-control" type="text" name="us_cedula" value="<?php echo $row->us_cedula; ?>" required /></td>
        
      </tr>

      <tr>
        <td><label class="control-label">Nombre.</label></td>
        <td><input class="form-control" type="text" name="us_nombre" value="<?php echo $row->us_nombre; ?>" required /></td>
      </tr>

      <tr>
        <td><label class="control-label">Apellido.</label></td>
        <td><input class="form-control" type="text" name="us_apellido" value="<?php echo $row->us_apellido; ?>" required /></td>
      </tr>

      <tr>
        <td><label class="control-label">Dirección.</label></td>
        <td><input class="form-control" type="text" name="us_direccion" value="<?php echo $row->us_direccion; ?>" required /></td>
      </tr>

      <tr>
        <td><label class="control-label">Email.</label></td>
        <td><input class="form-control" type="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  id="correo"  name="us_email" value="<?php echo $row->us_email; ?>" required /></td>
      </tr>
      
      
    </table>

    <div  class="modal-footer" >
                       <br>
   
    
     <button  class="mybtn btn-link waves-effect" type="submit" id="enviar" onclick="validarformulario()" name="submit"><h4>Actualizar</h4></button>
    <a href="administrar_usuarios.php"><button type="button" name="" class="mybtn btn-link waves-effect" ><h4>Cancelar</h4></button></a>
  </form>
  

  <?php
	
	if(isset($_POST['submit'])){
		$field = array("us_cedula"=>$_POST['us_cedula'], "us_nombre"=>$_POST['us_nombre'], "us_apellido"=>$_POST['us_apellido'], "us_direccion"=>$_POST['us_direccion'], "us_email"=>$_POST['us_email']);
		$tbl = "usuario";
		edit($tbl,$field,'us_codigo',$id);
		header("location:administrar_usuarios.php");
	}
?>


</div>
</body>
</html>