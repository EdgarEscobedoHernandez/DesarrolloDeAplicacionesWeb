<?php
session_start();

include_once '../bd/conexion.php';

//cuando se presiona el boto enviar valida al usuario
if(!isset($_POST["btnEnviar"])) {exit;}

$usr = $_POST['txtUsuario'];
$pwd = md5($_POST['txtPwd']);
$strQry = "select * from usuario where usr = '".$usr."' and pwd='$pwd'";


//ejecutar query
$result = mysqli_query($link,$strQry);

//evalua resultado del query
if(mysqli_num_rows($result)>0){
	//echo '>>'.$usr;
	//asignar valores del registro inmediato al vector llamado registro
	$registro = mysqli_fetch_array($result);

	//asigna valores de usuario
	$_SESSION['usr'] = $usr;
	$_SESSION['cat'] = $registro['cat'];
	header("Location: ./menu.php");
}
else{
	echo "
	<script>
		alert('Usuario y/o contraseña incorrectos');
		window.location.href = './inicio.php';
	</script>
	";
}
?>
