<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","bd_cooperativa");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>