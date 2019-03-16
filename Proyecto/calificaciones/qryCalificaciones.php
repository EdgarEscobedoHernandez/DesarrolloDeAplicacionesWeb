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
			$matricula = mysqli_real_escape_string($link, $_POST['txtMatricula']);
			$curso = mysqli_real_escape_string($link, $_POST['txtCurso']);
			$profesor = mysqli_real_escape_string($link, $_POST['txtProfesor']);
			$periodo = mysqli_real_escape_string($link, $_POST['txtPeriodo']);
			$calif = mysqli_real_escape_string($link, $_POST['txtCalif']);

			$strQry = "INSERT INTO calificacion VALUES ('$matricula','$matricula', '$curso', '$profesor', '$periodo', '$calif');";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de captura de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwCalificaciones.php'
			</script>";

			break;

		//opcion modificar...
		case 'upd':

			// consultar el query para actualizar en la tabla de la bd...
			$matricula = mysqli_real_escape_string($link, $_POST['txtMatricula']);
			$curso = mysqli_real_escape_string($link, $_POST['txtCurso']);
			$profesor = mysqli_real_escape_string($link, $_POST['txtProfesor']);
			$periodo = mysqli_real_escape_string($link, $_POST['txtPeriodo']);
			$calif = mysqli_real_escape_string($link, $_POST['txtCalif']);

			$strQry = "UPDATE calificacion  SET curso='$curso', profesor='$profesor',periodo=
			'$periodo',calif='$calif' WHERE matricula='$matricula';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de actualizacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwCalificaciones.php'
			</script>";
			
			break;

		// eliminar...
		case 'del':
			// consultar el query para eliminar en la tabla de la bd...
			$matricula = mysqli_real_escape_string($link, $_POST['txtMatricula']);
			$strQry = "DELETE FROM calificacion WHERE matricula ='$matricula';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de eliminacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwCalificaciones.php'
			</script>";

			break;
	}

?>
