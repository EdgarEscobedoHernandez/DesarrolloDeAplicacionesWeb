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
			
			$nombre = mysqli_real_escape_string($link, $_POST['txtNombre']);
			$especialidad = mysqli_real_escape_string($link, $_POST['txtEspecialidad']);
			$clave=mysqli_real_escape_string($link,$_POST['txtClave']);
			$semestre = mysqli_real_escape_string($link,$_POST['txtSemestre']);
			$strQry = "INSERT INTO curso (id, clave, nombre, especialidad, semestre) VALUES ('$clave', '$clave', '$nombre', '$especialidad', '$semestre');";

			$result = mysqli_query($link, $strQry) or die("*** Error al ejecutar el query: ".mysqli_error()."clave: $clave, nombre $nombre, especialidad: $especialidad, semestre: $semestre");

			//redirigie el programa al script html de captura de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwCursos.php'
			</script>";

			break;

		case 'upd':

			// consultar el query para actualizar en la tabla de la bd...
			$nombre = mysqli_real_escape_string($link, $_POST['txtNombre']);
			$especialidad = mysqli_real_escape_string($link, $_POST['txtEspecialidad']);
			$clave=mysqli_real_escape_string($link,$_POST['txtClave']);
			$semestre = mysqli_real_escape_string($link,$_POST['txtSemestre']);
			$strQry = "UPDATE curso  SET nombre='$nombre', semestre = '$semestre',  especialidad = '$especialidad' WHERE clave='$clave';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de actualizacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwCursos.php'
			</script>";
			
			break;

			case 'del':
			// consultar el query para eliminar en la tabla de la bd...
			$clave = mysqli_real_escape_string($link, $_POST['txtClave']);
			$strQry = "DELETE FROM curso WHERE clave ='$clave';";

			$result = mysqli_query($link, $strQry) or
			die("*** Error al ejecutar el query: ".mysqli_error());

			//redirigie el programa al script html de eliminacion de datos
			echo "<script type='text/javascript'>
			window.location.href='./shwCursos.php'
			</script>";

			break;
		}
?>