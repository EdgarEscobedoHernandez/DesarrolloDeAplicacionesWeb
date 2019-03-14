<?php
	session_start();
	if(empty($_SESSION['usr']))	{
		echo "Debe autentificarse!";
		exit();
	}

	include '../bd/conexion.php';

	$qryCurso = 'SELECT * FROM curso GROUP BY curso.clave;';
	$qryProfesor = 'SELECT * FROM profesor GROUP BY profesor.clave;';

  	$listaProfesor = mysqli_query($link, $qryProfesor);
  	$listaCurso = mysqli_query($link, $qryCurso);
?>
<html>
<head>
	<title>Agrega calificiaciones</title>
</head>
<body>
<form id='frmAddCalificaciones' action='./qryCalificaciones.php' method='POST'>
	<table align='center' border='0'>
		<tr height='60'>
			<td colspan='2' align='center'>
			<b>Agregando calificaciones</b>
			<input type='hidden' id='txtOpc' name='txtOpc' value='add'>
			</td>
		</tr>
		<tr>
			<td>Matricula</td>
			<td><input type='text' id='txtMatricula' name='txtMatricula' maxlength="2" autofocus></td>
		</tr>
		<tr>
			<td>Curso</td>
			<td>
				<select id='txtCurso' name='txtCurso' autofocus>
					<option value=''>-- Seleccione una opcion --</option>
				<?php
					while($regCurso = mysqli_fetch_array($listaCurso)){
					$nombre = $regCurso['nombre'];
					$clave = $regCurso['clave'];

					echo "<option value='$clave'>$nombre</option>";
				}?>
				</select>
			</td>
			<!--<td><input type='text' id='txtCurso' name='txtCurso' maxlength="2" autofocus=""></td>-->
		</tr>
		<tr>
			<td>Profesor</td>
			<td>
				<select id='txtProfesor' name='txtProfesor' autofocus>
					<option value=''>-- Seleccione una opcion --</option>
				<?php
					while($regProfesor = mysqli_fetch_array($listaProfesor)){
						$nombre = $regProfesor['nombre'];
						$materno = $regProfesor['materno'];
						$paterno = $regProfesor['paterno'];
						$clave = $regProfesor['clave'];

						echo "<option value='$clave'>$nombre&nbsp$paterno&nbsp$materno</option>";
				}
				mysqli_free_result($link, $tablaBD);
				mysqli_close($link);
				?>
				</select>
			</td>
			<!--<td><input type='text' id='txtProfesor' name='txtProfesor' maxlength="20" autofocus=""></td>-->
		</tr>
		<tr>
			<td>Periodo</td>
			<td><input type='text' id='txtPeriodo' name='txtPeriodo' maxlength="1" autofocus></td>
		</tr>
		<tr>
			<td>Calificacion</td>
			<td><input type='text' id='txtCalif' name='txtCalif' maxlength="5" autofocus></td>
		</tr>
		
	</table>
	<table align='center'>
	<tr height='50px'>
		<td align='center'>
			<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick="javascript: grabar('calificaciones');">
		</td>
		<td colspan='2' align='center'>
			<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick="javascript: window.location.href = './shwCalificaciones.php';">
		</td>
	</tr>
</table>
</form>

</body>
<script type='text/javascript' src='../js/funciones.js'></script>
</html>
