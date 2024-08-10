<?php

    require "../funcs/funcs.php";
     require "../funcs/conexion.php";

     

    $errors = array();

    if(!empty($_POST))

    {

    

        $cedula = $mysqli->real_escape_string($_POST['cedula']);
        $nombre = $mysqli->real_escape_string($_POST['nombre']);
        $password = $mysqli->real_escape_string($_POST['clave']);
        $con_password = $mysqli->real_escape_string($_POST['repetirclave']);
        $lugar_nac = $mysqli->real_escape_string($_POST['lugar_nac']);
        $fecha_nac = $mysqli->real_escape_string($_POST['fecha_nac']);
        $copia_ced = $mysqli->real_escape_string($_POST['copia_ced']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $telefono = $mysqli->real_escape_string($_POST['telefono']);
        $telefono_conv = $mysqli->real_escape_string($_POST['telefono_conv']);
        $genero = $mysqli->real_escape_string($_POST['genero']);
        $estado_c = $mysqli->real_escape_string($_POST['estado_c']);
        $direccion = $mysqli->real_escape_string($_POST['direccion']);
        $foto = $mysqli->real_escape_string($_POST['foto']);
        $id_tipo = $mysqli->real_escape_string($_POST['tipo']);
        
        $activo = 1;
    
    if(isNull( $cedula, $nombre, $password, $con_password, $lugar_nac,  $fecha_nac, $copia_ced, $email, $telefono, $telefono_conv, $genero, $estado_c, $direccion, $foto ))
        {
            $errors[] = "Debe llenar todos los campos";
        }

        if(cedulaExiste($cedula))
        {
            $errors[] = "El número de cedula $cedula ya existe";
        }

        if(!isEmail($email))
        {
            $errors[] = "Dirección de correo inválida";
        }

        if(!validaPassword($password, $con_password))
        {
            $errors[] = "Las contraseñas no coinciden";
        }



        if(emailExiste($email))
        {
            $errors[] = "El correo electronico $email ya existe";
        }

            if(count($errors) == 0)
        {

                $pass_hash = hashPassword($password);
                $token = generateToken();

                $registro = registraUsuario( $cedula, $nombre, $pass_hash,  $lugar_nac,  $fecha_nac, $copia_ced, $email, $telefono, $telefono_conv, $genero, $estado_c, $direccion, $foto,  $activo, $token, $id_tipo);

                //header("location:../index.php");
                                                    ?>
                <script type="text/javascript">
                    alert("Registro de Usuario Exitoso");
                    window.location.href = "../index.php";
                </script>
                <?php

                    exit;


                    }
                    }



    


   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>REGISTRO USUARIO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1.custom/jquery-ui.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="librerias/jquery-3.3.1.min.js"></script>
    <script src="librerias/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
   

    <style type="text/css">
        .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}

.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    letter-spacing: 1px;
    width: 50%;
    cursor: pointer;
}
.alert {
    width: 70%;
    background: #66e07d66;
    border-radius: 6px;
    margin: 20px auto;
}
.msg_error {
    color:#e65656;
}
.msg_save{
    color: #126e00;
}
.alert p{
    padding: 10px;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 180px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>

<script type="text/javascript">
//Si se quiere generar una contraseña
if (isset($_POST['generar'])) {
   //Carácteres para la contraseña
   $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
   $password = "";
   //Reconstruimos la contraseña segun la longitud que se quiera
   for($i=0;$i<$_POST['longitud'];$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str,rand(0,62),1);
   }
   //Mostramos la contraseña generada
   echo 'Password generado: '.$password;
}
?>
</script>


  
  

     





<script type="text/javascript">
    $(document).ready(function(){
        $("#calendario").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1900:' + 2018,
            dateFormat: "yy-mm-dd"
        });

        $('#calendario').change(function(){
            $.ajax({
                type:"POST",
                data:"fecha=" + $('#calendario').val(),
                url:"php/calcularEdad.php",
                success:function(r){
                    $('#edadCalculada').text(r + " años");
                }
            });
        });
    });
</script>

<script >
    
$(document).ready(function() {
    $("#submit").on("click", function() {
        var condiciones = $("#aceptar").is(":checked");
        if (!condiciones) {
            alert("Debe aceptar las condiciones");
            event.preventDefault();
        }
    });
});

$(document).ready(function() {
    $("#submit").on("click", function() {
        var condiciones = $("#aceptar").is(":checked");
        if (!condiciones) {
            alert("Debe aceptar las condiciones");
            event.preventDefault();
        }
    });
});
</script>

</head>
<body>

    <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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
<script>
if( $('.micheckbox').is(':checked') ) {
    alert('Seleccionado');
}
</script>

<form id="signupform"  role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" onSubmit="return validacion()" >

        <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>

        

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="imagenes/registro.png" alt=""/>
                        <h3>Bienvenidos</h3>
                       
                        <a href="../login/index.php"><input type="button" name=""  value="Login"/></a><br/>
                    </div>
                    
        
                                
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registro Usuarios</a>
                            </li>
                           
                            </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Registro Usuarios</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <input type="text" class="form-control" maxlength="10" placeholder="Cédula de Identidad*" id="cedula" name="cedula" value="<?php if(isset($cedula)) echo $cedula; ?>" onkeypress="return solonumeros(event)"   />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nombres y Apellidos *" name="nombre" id="nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" onkeypress="return soloLetras(event)" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control" maxlength="15" placeholder="Password *" name="clave" id="clave" value="<?php if(isset($password)) echo $password; ?>"  />
                                            
                                            <FONT SIZE=2>Entre 5 y 15 caracteres</font>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" maxlength="15" placeholder="Confirm Password *" name="repetirclave" id="repetirclave" value="<?php if(isset($con_password)) echo $con_password; ?>"/>
                                        </div>


                                        <div class="form-group">

                                            <input list="lugarnac" placeholder="Lugar de Nacimiento *" class="form-control" name="lugar_nac" id="lugar_nac"  class="selectpicker" value="<?php if(isset($lugar_nac)) echo $lugar_nac; ?>" >
                                                    <datalist id="lugarnac">
                                                <option value="Azuay">
                                                <option value="Bolívar">
                                                <option value="Cañar">
                                                <option value="Carchi">
                                                <option value="Chimborazo">
                                                <option value="Cotopaxi">
                                                <option value="El Oro">
                                                <option value="Esmeraldas">
                                                <option value="Galápagos">
                                                <option value="Guayas">
                                                <option value="Imbabura">
                                                <option value="Loja">
                                                <option value="Los Ríos">
                                                <option value="Manabí">
                                                <option value="Morona Santiago">
                                                <option value="Napo">
                                                <option value="Orellana">
                                                <option value="Pastaza">
                                                <option value="Pichincha">
                                                <option value="Santa Elena">
                                                <option value="Santo Domingo de los Tsáchilas">
                                                <option value="Sucumbios">
                                                <option value="Tungurahua">
                                                <option value="Zamora Chinchipe">
                                                    </datalist>
                                            
                                        </div>
                                         <div class="form-group">
                                            <label> Fecha de Nacimiento </label>
                                            <input  class="form-control " type="date" placeholder="Fecha de Nacimiento *" name="fecha_nac" id="fecha_nac" value="<?php if(isset($fecha_nac)) echo $fecha_nac; ?>" >

                                        </div>

                                            

                        

                                         <div class="form-group">
                                            <label> Copia de Cédula y Papel de Votación </label>
                                            <input  type="file" accept="image/*" class="form-control" placeholder="Copia de Cédula *" name="copia_ced" id="copia_ced" value="<?php if(isset($copia_ced)) echo $copia_ced; ?>" />
                                        </div>

                                                                 

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email *" id="email" value="<?php if(isset($email)) echo $email; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="telefono" id="telefono" class="form-control" placeholder="Celular *" onkeypress="return solonumeros(event)" value="<?php if(isset($telefono)) echo $telefono; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  maxlength="10" name="telefono_conv" id="telefono_conv" class="form-control" onkeypress="return solonumeros(event)" placeholder=" Teléfono Convencional *" value="<?php if(isset($telefono_conv)) echo $telefono_conv; ?>" />
                                        </div>
                                        <div class="form-group">

                                            <input list="generos" placeholder="Genero *" class="form-control" name="genero" id="genero"   class="selectpicker" value="<?php if(isset($genero)) echo $genero; ?>">
                                                    <datalist id="generos">
                                                <option value="Femenino">
                                                <option value="Masculino">
                                                
                                                    </datalist>
                                            
                                        </div>
                                        <div class="form-group">

                                            <input list="estado" placeholder="Estado Civil *" class="form-control" name="estado_c" id="estado_c" class="selectpicker" value="<?php if(isset($estado_c)) echo $estado_c; ?>">
                                                    <datalist id="estado">
                                                <option value="Soltero(a)">
                                                <option value="Casado(a)">
                                                <option value="Unión Libre">
                                                <option value="Divorciado(a)">
                                                <option value="Viudo(a)">
                                                
                                                    </datalist>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección *" value="<?php if(isset($direccion)) echo $direccion; ?>" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> Foto de perfil </label>
                                            <input  type="file" accept="image/*" class="form-control" name="foto" id="foto" placeholder="Foto de perfil *" value="<?php if(isset($foto)) echo $foto; ?>" />
                                        </div>

                                        <div class="form-group">

                                            
                                                <label> Tipo de Usuario </label>

                                                <select id="tipo" name="tipo" class="form-control" placeholder="Tipo Usuario *" value="<?php if(isset($tipo_usuario)) echo $tipo_usuario; ?>">

                                                    <option value="" >-Seleccione-</option>

                                                    <?php $consulta4=mysqli_query($con, "SELECT * from tipo_usuario ");
                                                       while($row4=mysqli_fetch_array($consulta4)){
                                                       echo "<option value='".$row4['id_tipo']."'>"; echo $row4['tipo']; echo "</option>"; } ?> </select>


                                              
                                                
                                            
                                        </div>

                                                              
                                        
                                        <label> Politica de privacidad </label>
                                            <input type="checkbox" type="checkbox" name="aceptar" id="aceptar" /><span>Acepto las condiciones.</span>
                                        
                                        <input type="submit" id="submit" class="btnRegister"  value="Registrarse"/>
                                        <a href="../index.php"><input type="button" class="btnRegister"  value="Cancelar"/></a>


                                    </div>
                                </div>
                                           
                            </div>

                            

                            
 </form>

                             
                <?php echo resultBlock($errors);
                 ?>

                        </div>
                    </div>
                </div>
            




                

            </div>
<script type="text/javascript">


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap-filestyle.js"> </script>
<script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>

<script type="text/javascript">
    

        $('#fecha_nac').change(function(){
            $.ajax({
                type:"POST",
                data:"fecha=" + $('#fecha_nac').val(),
                url:"php/calcularEdad.php",
                success:function(r){
                    $('#edadCalculada').text(r + " años");
                }
            });
        });
    
</script>

</html>
