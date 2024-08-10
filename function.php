<?php
function db_query($query) {
    $connection = mysqli_connect("localhost","root","","bd_cooperativa");
    $result = mysqli_query($connection,$query);

    return $result;
}

function delete($tblname,$field_id,$id){

	$sql = "DELETE from ".$tblname." WHERE ".$field_id."=".$id."";

	return db_query($sql);
}

function delete_tabla($tblname,$field_id,$id){

	$sql = "DELETE FROM  ".$tblname."" ;

	return db_query($sql);
}



function bloquear($tblname,$field_id,$id){

	$sql= "UPDATE usuarios SET activacion = '0'   WHERE " .$field_id."=".$id."";
	return db_query($sql);
}


function desbloquear($tblname,$field_id,$id){

	$sql= "UPDATE usuarios SET activacion = '1'   WHERE " .$field_id."=".$id."";
	return db_query($sql);
}



 function insertar($tblname,$form_data){
	$fields = array_keys($form_data);
	$sql="INSERT INTO ".$tblname."(".implode(',', $fields).")  VALUES('".implode("','", $form_data)."')";
	return db_query($sql);

}

function insertar1($tblname,$form_data){
	$fields = array_keys($form_data);
	$sql="INSERT INTO ".$tblname."(".implode(',', $fields).")  VALUES('".implode("','", $form_data)."')";
	return db_query($sql);

}


function select_datos($tblname,$field_name,$field_id){
	$sql = "SELECT * from ".$tblname." where ".$field_name." = ".$field_id."";
	$db=db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);

	return $sql;

}

function edit($tblname,$form_data,$field_id,$id){
	$sql = "UPDATE ".$tblname." SET ";
	$data = array();

	foreach($form_data as $column=>$value){

		$data[] =$column."="."'".$value."'";

	}
	$sql .= implode(',',$data);
	$sql.=" where ".$field_id." = ".$id."";
	return db_query($sql);
}


function select_id($tblname,$field_name,$field_id){
	$sql = "Select * from ".$tblname." where ".$field_name." = ".$field_id."";
	$db=db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);

	return $sql;

}


function cambio_clave($tblname,$field_id,$id){
	$clave=$_POST[clave];
	$clave2==$_POST[clave2];
	$sql= "UPDATE usuarios SET us_clave = '$clave', us_clave = '$clave2'   WHERE " .$field_id."=".$id."";
	return db_query($sql);
}



?>
