<?php
$user = 'root';
$password = '123456';
$db = 'kardex';
$host = 'localhost';
$port = 81;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);

if(!$success){
  echo "<script>alert('No se pudo conectar con la base de datos.');</script>";
  echo "<script>window.location.href='./inicio.php';</script>";
  exit();
}

?>
