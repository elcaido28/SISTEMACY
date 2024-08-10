<?php

    require "../funcs/funcs.php";
    

    if(!empty($_POST))

    {

    $alert ='';
    if(empty($_POST['us_cedula']) || empty($_POST['us_nombre']) || empty($_POST['us_clave']) || empty($_POST['us_lugar_nac']) || empty($_POST['us_fecha_nac']) || empty($_POST['us_copia_ced']) || empty($_POST['us_email']) || empty($_POST['us_telefono']) || empty($_POST['us_tel_convenc']) || empty($_POST['us_genero']) || empty($_POST['us_estadoc']) || empty($_POST['us_direccion']) || empty($_POST['us_foto']) || empty($_POST['id_tipo']) || empty($_POST['activacion']))

    {
        $alert ='<p class"msg_error">Todos los campos son obligatorios.</p>';

    } else {

        include "../funcs/conexion.php";

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $password = md5($_POST['clave']);
        $con_password = $_POST['repetirclave'];
        $lugar_nac = $_POST['lugar_nac'];
        $fecha_nac = $_POST['fecha_nac'];
        $copia_ced = $_POST['copia_ced'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $telefono_conv = $_POST['telefono_conv'];
        $genero = $_POST['genero'];
        $estado_c = $_POST['estado_c'];
        $direccion = $_POST['direccion'];
        $foto = $_POST['foto'];
        $tipo_usuario = $_POST['tipo'];
        $activacion = $_POST['activacion'];
        
    
    $query = mysqli_query($conection, "SELECT * FROM usuarios WHERE us_cedula = '$cedula' OR us_email = '$email' ");
    $result = mysqli_fetch_array($query);



    if($result > 0){
        $alert ='<p class"msg_error">El numero de cedula o email ya existe.</p>';
    } else {

        $query_insert = mysqli_query($conection, "INSERT INTO usuarios(us_cedula, us_nombre, us_clave, us_lugar_nac, us_fecha_nac, us_copia_ced, us_email, us_telefono, us_tel_convenc, us_genero, us_estadoc, us_direccion, us_foto, id_tipo, activacion)
                                        VALUES ('$cedula', '$nombre', '$password', '$lugar_nac', '$fecha_nac', '$copia_ced', '$email', '$telefono', '$telefono_conv', '$genero', '$estado_c', '$direccion', '$foto', '$tipo_usuario', '$activacion')");

        if($query_insert){

            $alert ='<p class"msg_save">Usuario creado correctamente.</p>';

        }else{

            $alert ='<p class"msg_error">Error al crear el usuario.</p>';
        }
    }

}

}

    $activo = 1;


   
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
<script>
$(function(){
  
  

     var cedula = '0931811087';

     //Preguntamos si la cedula consta de 10 digitos
     if(cedula.length == 10){
        
        //Obtenemos el digito de la region que sonlos dos primeros digitos
        var digito_region = cedula.substring(0,2);
        
        //Pregunto si la region existe ecuador se divide en 24 regiones
        if( digito_region >= 1 && digito_region <=24 ){
          
          // Extraigo el ultimo digito
          var ultimo_digito   = cedula.substring(9,10);

          //Agrupo todos los pares y los sumo
          var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));

          //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
          var numero1 = cedula.substring(0,1);
          var numero1 = (numero1 * 2);
          if( numero1 > 9 ){ var numero1 = (numero1 - 9); }

          var numero3 = cedula.substring(2,3);
          var numero3 = (numero3 * 2);
          if( numero3 > 9 ){ var numero3 = (numero3 - 9); }

          var numero5 = cedula.substring(4,5);
          var numero5 = (numero5 * 2);
          if( numero5 > 9 ){ var numero5 = (numero5 - 9); }

          var numero7 = cedula.substring(6,7);
          var numero7 = (numero7 * 2);
          if( numero7 > 9 ){ var numero7 = (numero7 - 9); }

          var numero9 = cedula.substring(8,9);
          var numero9 = (numero9 * 2);
          if( numero9 > 9 ){ var numero9 = (numero9 - 9); }

          var impares = numero1 + numero3 + numero5 + numero7 + numero9;

          //Suma total
          var suma_total = (pares + impares);

          //extraemos el primero digito
          var primer_digito_suma = String(suma_total).substring(0,1);

          //Obtenemos la decena inmediata
          var decena = (parseInt(primer_digito_suma) + 1)  * 10;

          //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
          var digito_validador = decena - suma_total;

          //Si el digito validador es = a 10 toma el valor de 0
          if(digito_validador == 10)
            var digito_validador = 0;

          //Validamos que el digito validador sea igual al de la cedula
          if(digito_validador == ultimo_digito){
            console.log('la cedula:' + cedula + ' es correcta');
          }else{
            console.log('la cedula:' + cedula + ' es incorrecta');
          }
          
        }else{
          // imprimimos en consola si la region no pertenece
          console.log('Esta cedula no pertenece a ninguna region');
        }
     }else{
        //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
        console.log('Esta cedula tiene menos de 10 Digitos');
     }    
  
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
function validacion() {
    //Validación de campo vacío
    if (document.getElementById("aceptocondiciones_chk").checked==false){
        alert("Acepta los terminos y condiciones del servicio");
        document.getElementById("<strong>aceptocondiciones_chk</strong>").focus();
        return false;
    }
    return true;
}
</script>

<form id="signupform"  role="form" action="" method="POST" autocomplete="off" >

        

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="imagenes/registro.png" alt=""/>
                        <h3>Bienvenidos</h3>
                       
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <form id="signupform"  role="form" action="" method="POST" autocomplete="off" >

        
                                
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
                                            <input type="text" class="form-control" maxlength="10" placeholder="Cédula de Identidad*" id="cedula" name="cedula"  />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nombres y Apellidos *" name="nombre" id="nombre" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control" maxlength="15" placeholder="Password *" name="clave" id="clave"  />
                                            
                                            <FONT SIZE=2>Entre 5 y 15 caracteres</font>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" maxlength="15" placeholder="Confirm Password *" name="repetirclave" id="repetirclave" />
                                        </div>


                                        <div class="form-group">

                                            <input list="browsers" placeholder="Lugar de Nacimiento *" class="form-control" name="lugar_nac" id="lugar_nac"  class="selectpicker" >
                                                    <datalist id="browsers">
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
                                            <input  class="form-control " type="date" placeholder="Fecha de Nacimiento *" name="fecha_nac" id="fecha_nac"  >
                                            
                                        </div>

                        

                                         <div class="form-group">
                                            <label> Copia de Cédula y Papel de Votación </label>
                                            <input  type="file" accept="image/*" class="form-control" placeholder="Copia de Cédula *" name="copia_ced" id="copia_ced"  />
                                        </div>

                                      
                                        
                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email *" id="email" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="telefono" id="telefono" class="form-control" placeholder="Celular *" onkeypress="return solonumeros(event)"  />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="telefono_conv" id="telefono_conv" class="form-control" onkeypress="return solonumeros(event)" placeholder=" Teléfono Convencional *"  />
                                        </div>
                                        <div class="form-group">

                                            <input list="generos" placeholder="Genero *" class="form-control" name="genero" id="genero"   class="selectpicker" >
                                                    <datalist id="generos">
                                                <option value="Femenino">
                                                <option value="Masculino">
                                                
                                                    </datalist>
                                            
                                        </div>
                                        <div class="form-group">

                                            <input list="estado" placeholder="Estado Civil *" class="form-control" name="estado_c" id="estado_c"   class="selectpicker" >
                                                    <datalist id="estado">
                                                <option value="Soltero(a)">
                                                <option value="Casado(a)">
                                                <option value="Unión Libre">
                                                <option value="Divorciado(a)">
                                                <option value="Viudo(a)">
                                                
                                                    </datalist>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección *"  />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> Foto de perfil </label>
                                            <input  type="file" accept="image/*" class="form-control" name="foto" id="foto" placeholder="Foto de perfil *"  />
                                        </div>

                                        <div class="form-group">

                                            

                                                <select id="tipo" name="tipo" class="form-control" placeholder="Tipo Usuario *">


                                                <option value="1">Administrador</option>
                                                <option value="2">Socios</option>
                                                <option value="3">Representante</option>
                                                <option value="4">Conductor</option>
                                                <option value="5">Acompañante Conductor</option>
                                                        
                                                                                                
                                                    </select>
                                                
                                            
                                        </div>

                                                              
                                        
                                        <label> Politica de privacidad </label>
                                            <input type="checkbox" name="aceptocondiciones_chk"  id="aceptocondiciones_chk" value="1" /><span>Acepto las condiciones.</span>
                                        
                                        <input type="submit" class="btnRegister"  value="Registrarse"/>
                                        <a href="../principal/index.php"><input type="button" class="btnRegister"  value="Cancelar"/></a>


                                    </div>
                                </div>
                                           
                            </div>

                            

                            
 </form>

                             
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

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
</html>
