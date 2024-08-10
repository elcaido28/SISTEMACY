<?php $get_id = $_GET['us_codigo']; ?>  
<?php
require_once 'funcs/conexion1.php';
require_once 'funcs/conexion.php';
  require 'funcs/funcs.php';
 
session_start();
    include('dbcon.php'); 

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
    $sql1 = "SELECT * FROM usuarios where us_codigo=$idpis";

     $resultado1 = $mysqli->query($sql1);
     $row = $resultado1->fetch_assoc();


      include("function.php");
     $id = $_REQUEST ['us_codigo'];
      //select_id('usuarios','us_codigo',$id);
     if(isset($_POST['submit'])){

        if ($_FILES['us_foto']['name']!="") {
          $nombre = $_FILES['us_foto']['name'];
          $ruta = $_FILES['us_foto']['tmp_name'];
          $destino = "Archivos/" . $nombre;
          copy($ruta, $destino);
        }else{
          $result2= mysqli_query($con,"SELECT * from usuarios where us_codigo='$id'");
          $row4= mysqli_fetch_assoc($result2);
          $nombre=$row4['us_foto'];
        }


        if ($_FILES['us_copia_ced']['name']!="") {
          $nombre1 = $_FILES['us_copia_ced']['name'];
          $ruta1 = $_FILES['us_copia_ced']['tmp_name'];
          $destino1 = "Archivos/" . $nombre1;
          copy($ruta1, $destino1);
        }else{
          $result3= mysqli_query($con,"SELECT * from usuarios where us_codigo='$id'");
          $row3= mysqli_fetch_assoc($result3);
          $nombre1=$row3['us_copia_ced'];
        }

       
        if ($sele_num<1) {

       $field = array("us_cedula"=>$_POST['us_cedula'], "us_nombre"=>$_POST['us_nombre'], "us_apellido"=>$_POST['us_apellido'], "us_lugar_nac"=>$_POST['us_lugar_nac'], "us_fecha_nac"=>$_POST['us_fecha_nac'], "us_copia_ced"=>$nombre1, "us_email"=>$_POST['us_email'], "us_telefono"=>$_POST['us_telefono'], "us_tel_convenc"=>$_POST['us_tel_convenc'], "us_genero"=>$_POST['us_genero'], "us_estadoc"=>$_POST['us_estadoc'], "us_direccion"=>$_POST['us_direccion'], "us_foto"=>$nombre, "id_tipo"=>$_POST['id_tipo'],);

       $tbl = "usuarios";
       //$id = $_GET['us_codigo'];
       edit($tbl,$field,'us_codigo',$id);
       //select_id('usuarios','us_codigo',$id);
     }
     
       header("Location:administrar_usuarios.php");
       
      
        
     }




?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Editar Usuario</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">

<!-- Latest compiled and minified JavaScript -->

</head>
<body>

<div class="container">
  <div class="page-header">
    <h1 class="h2">Actualización de Usuarios. <a class="btn btn-default" href="administrar_usuarios.php"> Listar Usuarios </a></h1>
  </div>
  <div class="clearfix"></div>

  <?php
            $query = mysqli_query($connection,"select * FROM usuarios  where us_codigo = '$get_id'") or die(mysql_error());
            $row = mysqli_fetch_array($query);
            ?>

   <form action="" method="post" enctype="multipart/form-data">
    
    
    <table class="table table-bordered table-responsive">
      <tr>
        <td><label class="control-label">Cédula.</label></td>
        <td><input class="form-control" type="text" name="us_cedula"  value="<?php echo $row['us_cedula']; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Nombres.</label></td>
        <td><input class="form-control" type="text" name="us_nombre" value="<?php echo utf8_decode($row['us_nombre']); ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Apellidos.</label></td>
        <td><input class="form-control" type="text" name="us_apellido" value="<?php echo utf8_decode($row['us_apellido']); ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Lugar Nacimiento.</label></td>
        <td><input class="form-control" type="text" name="us_lugar_nac" value="<?php echo $row['us_lugar_nac']; ?>" required /></td>
        
      </tr>
      <tr>
        <td><label class="control-label">Fecha de Nacimiento.</label></td>
        <td><input class="form-control" type="date" name="us_fecha_nac" value="<?php echo $row['us_fecha_nac']; ?>" required /></td>
      </tr>
       <tr>
        <td><label class="control-label">Copia de Cédula/Papel de Votación.</label></td>
        <td><p><img src="imagenes/<?php echo $row['us_copia_ced']; ?>" height="150" width="150" /></p>
          <input class="input-group" type="file" name="us_copia_ced" accept="image/*" /></td>
      </tr>
      <tr>
        <td><label class="control-label">Email.</label></td>
        <td><input class="form-control" type="email" name="us_email" value="<?php echo $row['us_email']; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Telefono.</label></td>
        <td><input class="form-control" type="text" name="us_telefono" value="<?php echo $row['us_telefono']; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Telefono Convencional.</label></td>
        <td><input class="form-control" type="text" name="us_tel_convenc" value="<?php echo $row['us_tel_convenc']; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Género.</label></td>
        <td>
        <select name="us_genero" class="span5" required>
                          <option><?php echo $row['us_genero']; ?></option>
                          
                        </select>
                      </td>
      </tr>
      <tr>
        <td><label class="control-label">Estado Civil.</label></td>
        <td><input class="form-control" type="text" name="us_estadoc" value="<?php echo $row['us_estadoc']; ?>" required /></td>
        
      </tr>
      <tr>
        <td><label class="control-label">Dirección.</label></td>
        <td><input class="form-control" type="text" name="us_direccion" value="<?php echo utf8_decode( $row['us_direccion']); ?>" required /></td>
      </tr>
      
      <tr>
        <td><label class="control-label">Foto.</label></td>
        <td><p><img src="imagenes/<?php echo $row['us_foto']; ?>" height="150" width="150" /></p>
          <input class="input-group" type="file" name="us_foto" accept="image/*" /></td>
      </tr>
      <tr>
        <td><label class="control-label">Tipo Usuario:</label> </td>   
                <td>  <select name="tipo" class="form-control" required>
                  
                    <?php 
                      $result = mysqli_query($connection,"SELECT * from tipo_usuario ")or die(mysql_error());
                      while($row1 = mysqli_fetch_array($result)){
                      $tipo = $row1['tipo'];     
                       ?>
                <option value="<?php echo $row['id_tipo'];?>"> <?php echo $tipo;?> </option>
                  <?php }?>
              </select> </td>
            </tr>
      <tr>
        <td colspan="2"><button  class="mybtn btn-link waves-effect" type="submit" name="submit"><h4>Actualizar</h4></button>
          <a class="btn btn-default" href="administrar_usuarios.php"> <span class="glyphicon glyphicon-backward"></span> cancelar </a></td>
      </tr>
    </table>
  </form>
  
</div>
</body>
</html>



