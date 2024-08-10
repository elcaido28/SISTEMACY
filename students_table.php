	<?php

//header('Content-Type:text/html; charset=UTF-8');

?>
	<style type="text/css">
		.pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    } 

    /* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
</style>

<style type="text/css">
  .boton_2{
    
    padding: 5px;
    
    
    color: #fff;
    background-color: #9b0e0e;
  }
  .boton_2:hover{
    color: #9b0e0e;
    background-color: #bc6355;
    
  }
</style>

<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript" language="javascript" src="jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.dataTables.css" media="screen" />



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">







<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

</script>

</head>

	<?php include('dbcon.php'); 

	$record_per_page = 5;
$pagina = '';
if(isset($_GET["pagina"]))
{
 $pagina = $_GET["pagina"];
}
else
{
 $pagina = 1;
}

$start_from = ($pagina-1)*$record_per_page;

	?>
	<form action="delete_stud.php" method="post">
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div style="float:right">
	
	<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Eliminar</a>
	<?php include('modal_delete.php'); ?>
	  
	 </div>
	<div style="float:left">
	<a  href="registro/index.php" id="delete"  class="btn btn-danger" name=""><i class="fa-edit fa"></i> Agregar Usuario</a>
	<br>
	</div>
	
	<br>
	<div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft"></h3>
                        
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3></h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">

		<thead>
			<br>
		<tr>
						  <th><center>Código </center></th>
						  <th><center>Cédula </center></th>
                          <th><center>Nombres y Apellidos </center></th>
                          <th><center>Lugar de Nacimiento </center></th>
                          <th><center>Email </center></th>
                          <th><center>Telefono </center></th>
                          <th><center>Tipo Usuario </center></th>
                          <th><center>Estado Civil </center></th>
                          <th><center>Activación </center></th>
                          <th><center>Acciones </center></th>
					<th class="empty"></th>
					<th class="empty"></th>
		</tr>
		</thead>
		<tbody>


		<?php

		$query = mysqli_query($connection,"SELECT  usuarios.us_codigo, usuarios.us_cedula,  usuarios.us_nombre, usuarios.us_apellido, usuarios.us_lugar_nac, usuarios.us_email, usuarios.us_telefono, usuarios.us_estadoc, usuarios.activacion, tipo_usuario.tipo FROM usuarios INNER JOIN tipo_usuario ON usuarios.id_tipo = tipo_usuario.id_tipo ")or die(mysql_error());


		while($row = mysqli_fetch_array($query)){
		$id = $row['us_codigo'];
		?>
		<tr>
		<td><?php echo  $row['us_codigo']; ?></td>
		<td><?php echo  $row['us_cedula']; ?></td> 
		<td><?php echo utf8_decode ($row['us_nombre'].' '.$row['us_apellido']);?></td> 
		<td><?php echo $row['us_lugar_nac']; ?></td> 
		<td><?php echo $row['us_email']; ?></td> 
		<td><?php echo  $row['us_telefono']; ?></td> 
		<td><?php echo $row['tipo']; ?></td> 
		<td><?php echo $row['us_estadoc']; ?></td> 
		<td>
		<?php if($row['activacion']){  // campo igual 1 true 
?>

<span class="colorVerde" style="background-color: #2FEC26; color: #FFF ">Activo</span>
<?php } else { //Si no es uno
?>
<span class="colorRojo">Desactivado</span>
<?php } ?></span></td>
		<center>
		<td class="empty" ><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
		

			
		 <a  href="editar_usu.php?us_codigo=<?php echo $row['us_codigo']; ?>" title="click para editar" onclick="return confirm('Esta seguro de editar el usuario ?')"   ><span class=" fa-edit fa"  style="font-size:20px; color: #2196F3"></span></a>

		 </center>

		</td>
		</td>
		</tr>
	<?php } ?>    
	
		</tbody>
	    </table>

	    

	    <script>
 
$(document).ready(function(){
    $('#Jtabla').DataTable();
 
});
</script>

<script>
 
$(document).ready(function(){
 
    $('#Jtabla').DataTable({
 
       columnDefs: [ {
 
            targets: [ 0 ],
 
            orderData: [ 0, 1 ]
 
        }, {
 
            targets: [ 1 ],
 
            orderData: [ 1, 0 ]
 
        }, {
 
            targets: [3 ],
 
            orderData: [ 3, 0 ]
 
        } ]
 
    } );
 
});
 
</script>


<script>
$("#GenerarMysql").click(function(){
  var pdf = new jsPDF();
  pdf.text(20,20,"Mostrando una Tabla con PHP y MySQL");

  var columns = ["Id", "Nombres", "Apellidos", "Telefono", "Edad"];
  var data = [
<?php foreach($clientes as $c):?>
 [<?php echo $n; ?>, "<?php echo $c->nombres; ?>", "<?php echo $c->apellidos; ?>", "<?php echo $c->telefono; ?>", "<?php echo $c->edad; ?>"],
<?php endforeach; ?>  
  ];

  pdf.autoTable(columns,data,
    { margin:{ top: 25  }}
  );

  pdf.save('MiTabla.pdf');

});
</script>

<script>
 
$(document).ready(function() {
 
    $('#Jtabla').dataTable( {
 
        stateSave: true
 
    } );
 
} );
 
</script>
 
 <script>
 
$(document).ready(function() {
 
    $('#Jtabla').dataTable( {
 
        "language": {
 
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
 
            "zeroRecords": "No se encontraron registros",
 
            "info": "P&aacutegina _PAGE_ of _PAGES_",
 
            "infoEmpty": "No hay registros"
 
        }
 
    } );
 
} );
 
</script>

<script>
 
$(document).ready(function() {
 
    $('#Jtabla').dataTable( {
 
        "language": {
 
    "sProcessing":     "Procesando...",
 
    "sLengthMenu":     "Mostrar _MENU_ registros",
 
    "sZeroRecords":    "No se encontraron resultados",
 
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
 
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
 
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
 
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
 
    "sInfoPostFix":    "",
 
    "sSearch":         "Buscar:",
 
    "sUrl":            "",
 
    "sInfoThousands":  ",",
 
    "sLoadingRecords": "Cargando...",
 
    "oPaginate": {
 
        "sFirst":    "Primero",
 
        "sLast":     "Último",
 
        "sNext":     "Siguiente",
 
        "sPrevious": "Anterior"
 
    },
 
    "oAria": {
 
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
 
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
 
    }
 
}
 
    
 
    } );
 
} );
 
</script>

<script>
 
$(document).ready(function() {
 
    $('#Jtabla').dataTable( {
 
        "language": {
 
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
 
        }
 
    } );
 
} );
 
</script>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>

	
	</form>
	<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>