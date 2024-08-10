<?php
include('dbcon.php');
//include('session.php');
if (isset($_POST['delete_student'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$query = mysqli_query($connection,"SELECT * from usuarios where us_codigo ='$id[$i]'")or die(mysql_error());
	$row = mysqli_fetch_array($query);
	$fname = $row['us_nombre'];
	//$mname = $row['middlename'];
	
	mysqli_query($connection,"DELETE FROM usuarios where us_codigo ='$id[$i]'");
	
}
header("location: administrar_usuarios.php");
}
?>