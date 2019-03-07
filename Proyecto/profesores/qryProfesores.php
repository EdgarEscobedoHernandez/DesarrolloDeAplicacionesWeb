<?php
	session_start();
	if(empty($_SESSION['usr'])){
		echo "Debe auteniticarse";
		exit();
	}

	include_once '../bd/conexion.php';

	$opcion = mysqli_real_escape_string($link, $_POST['txtOpc']);

	switch ($opcion) {
		//opcion grabar
		case 'add':
			// consultar el query para insertar en la tabla de la bd...
			$clave = mysqli_real_escape_string($link, $_POST['txtClave']);
            $nombre = mysqli_real_escape_string($link, $_POST['txtNombre']);
            $paterno = mysqli_real_escape_string($link, $_POST['txtPaterno']);
            $materno = mysqli_real_escape_string($link, $_POST['txtMaterno']); 
			$strQry = "INSERT INTO `profesor`(`id`, `clave`, `nombre`, `paterno`, `materno`) VALUES ('$clave','$clave', '$nombre', '$paterno', '$materno');";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de captura de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwProfesores.php'
			</script>";

			break;

		//opcion modificar...
		case 'upd':

			// consultar el query para actualizar en la tabla de la bd...
			$clave = mysqli_real_escape_string($link, $_POST['txtId']);
            $nombre = mysqli_real_escape_string($link, $_POST['txtNombre']);
            $paterno = mysqli_real_escape_string($link, $_POST['txtPaterno']);
            $materno = mysqli_real_escape_string($link, $_POST['txtMaterno']);             
			$strQry = "UPDATE profesor  SET nombre='$nombre', paterno='$paterno', materno='$materno' WHERE clave='$clave';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de actualizacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwProfesores.php'
			</script>";
			
			break;

		// eliminar...
		case 'del':
			// consultar el query para eliminar en la tabla de la bd...
			$clave = mysqli_real_escape_string($link, $_POST['txtId']);
			$strQry = "DELETE FROM profesor WHERE clave ='$clave';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de eliminacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwProfesores.php'
			</script>";

			break;
	}

?>
