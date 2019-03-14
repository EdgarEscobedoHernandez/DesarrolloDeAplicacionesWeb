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
			$id = mysqli_real_escape_string($link, $_POST['txtId']);
			$matricula = mysqli_real_escape_string($link, $_POST['txtMatricula']);
			$nombres = mysqli_real_escape_string($link, $_POST['txtNombres']);
			$paterno = mysqli_real_escape_string($link, $_POST['txtPaterno']);
			$materno = mysqli_real_escape_string($link, $_POST['txtMaterno']);
			$especialidad =  mysqli_real_escape_string($link, $_POST['txtEspecialidad']);
			$date= mysqli_real_escape_string($link, $_POST['date']);
			
			$strQry = "INSERT INTO alumno (id, matricula, nombre, paterno, materno,especialidad, fingreso) 
			VALUES ('$id','$matricula', '$nombres','$paterno','$materno', '$especialidad', '$date');";
			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ". $error= mysqli_error($link));


			//redirigie el programa al script html de captura de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwAlumnos.php'
			</script>";

			break;

		//opcion modificar...
		case 'upd':

			// consultar el query para actualizar en la tabla de la bd...
			$matricula = mysqli_real_escape_string($link, $_POST['txtId']);
			$nombre = mysqli_real_escape_string($link, $_POST['txtNombre']);
			$paterno = mysqli_real_escape_string($link, $_POST['txtPaterno']);
			$materno = mysqli_real_escape_string($link, $_POST['txtMaterno']);
			$strQry = "UPDATE alumno  SET nombre='$nombre', paterno = '$paterno', materno = '$materno' WHERE matricula='$matricula';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error($link));

			//redirigie el programa al script html de actualizacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwAlumnos.php'
			</script>";

			break;

		// eliminar...
		case 'del':
			// consultar el query para eliminar en la tabla de la bd...
			$matricula = mysqli_real_escape_string($link, $_POST['txtId']);
			$strQry = "DELETE FROM alumno WHERE matricula ='$matricula';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error($link));

			//redirigie el programa al script html de eliminacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwAlumnos.php'
			</script>";

			break;
	}

?>
