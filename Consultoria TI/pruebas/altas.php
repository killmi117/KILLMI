<?php
$us = $_POST['txtus'];
$con = $_POST['txtpas'];
include('conexion.php');


$r= mysqli_query($cn,"INSERT INTO usuarios VALUES(null,'$us','$con')");

	 header ('location:index.html');
mysqli_close($cn);

	


?>