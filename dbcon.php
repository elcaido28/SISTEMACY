<?php

$connection = mysqli_connect('localhost','root','','bd_cooperativa');
if (!$connection) {
	die("Connection failed" . mysqli_connect_error());
}
?>
