<?php
session_start();
if(empty($_SESSION['usr'])){
	echo "Debe autentificarse";
	exit();
}

include '../bd/conexion.php';

$id = $_GET['id'];
$strQry = "SELECT * FROM curso WHERE id = '$id'; ";
$tablaBD = mysqli_query($link,$strQry);

$registro = mysqli_fetch_array($tablaBD);
$clave = $registro['clave'];
$nombre = $registro['nombre'];
$especialidad = $registro['especialidad'];
$semestre = $registro['semestre'];
echo "

	<html>
	<head>
	<title></title>
	<script type='text/javascript'>
		function enviar(opc){
			switch (opc){
				case 'upd':
					document.getElementById('txtOpc').value = 'upd';
					document.getElementById('txtId').value = '".$id."';
					document.getElementById('frmUpdCursos').submit();
				break;

				case 'del':
					document.getElementById('txtOpc').value = 'del';
					document.getElementById('txtId').value = '".$id."';
					document.getElementById('frmUpdCursos').submit();
				break;

				case 'regresar':
					window.location.href=
					'./shwCursos.php';
					break;

			}
		}
		</script>
		</head>
		<body>
		<form name='frmUpdCursos' id='frmUpdCursos' action='./qryCursos.php'method='POST'>
		<table align='center' width='400' border='0'>

		<tr height='100'><td colspan='2' align='center'>
		<b> Modificando cursos </b>
		</tr>

		<tr>
			<td align='right' width='200'> Clave:&nbsp&nbsp</td>
			<td><input type='text' id='txtClave' name='txtClave' value= '$clave' readonly autofocus></td>
		</tr>

		<tr>
			<td align='right'> Nombre: &nbsp&nbsp</td>
			<td><input type='text' id='txtNombre' name='txtNombre' value= '$nombre' autofocus></td>
		</tr>

		<tr>
			<td align='right'> Especialidad: &nbsp&nbsp</td>
			<td><input type='text' id='txtEspecialidad' name='txtEspecialidad' value= '$especialidad' autofocus></td>
		</tr>

		<tr>
			<td align='right'> Semestre: &nbsp&nbsp</td>
			<td><input type='text' id='txtSemestre' name='txtSemestre' value= '$semestre' autofocus></td>
		</tr>

		<tr height='80'>
			<td colspan='2' align='center'>

			<input type='hidden' id='txtOpc' name='txtOpc'>
			<input type='hidden' id='txtId' name='txtId'>

			<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar'style='width: 100px' onclick='enviar(\"upd\")'>

			<input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width: 100px' onclick='enviar(\"del\")'>

			<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onclick='enviar(\"regresar\")'>
			</td>
		</tr>
		</table>
		</form>
		</body>
	</html>
	";
	?>