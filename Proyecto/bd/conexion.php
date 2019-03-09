<?php

$host = "localhost";
$dbuser = "root";
$dbpass = "123456";
$db = "kardex";

$link = mysqli_connect($host,$dbuser,$dbpass,$db);

if(mysqli_connect_error()){
	echo "<script>alert('No se pudo conectar con la base de datos.');</script>";
	echo "<script>window.location.href = './inicio.php';</script>";
	exit();
}
mysqli_select_db($link, 'kardex') or die('No se puede abrir la estructua de B.D.'.mysqli_connect_error());
?>