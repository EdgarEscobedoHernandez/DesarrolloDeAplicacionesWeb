<?php
  session_start();

  if(empty($_SESSION['usr'])){
    echo "Debe autentificarse";
    exit();
  }

  include_once '../bd/conexiones.php';

  $opcion = mysqli_real_escape_string($link, $_POST['txtOpc']);

  switch ($opcion) {
    case 'add':
      //construir el query para insertar en la tabla de la bd
      $clave = mysql_real_escape_string($link, $_POST['txtClave']);
      $nombre = mysqli_real_escape_string($link, $_POST['txtNombre']);
      $strQry = "INSERT INTO especialidad (clave, nombre) VALUES ('$clave', '$nombre');";

      $result = mysqli_query($link, $strQry) or die("***Error al ejecutar el query: ".mysqli_error());

      //redirigir el programa al script html de captura de datos
      echo "<script type='text/javascript'>window.location.href='./addEspecialidades.php'</script>";
      break;

    default:
      // code...
      break;
  }
?>
