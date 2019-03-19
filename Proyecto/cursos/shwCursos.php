<?php
session_start();
if(empty($_SESSION['usr'])){
	echo "Debe autentificarse";
	exit();
}

include '../bd/conexion.php';
$qry = "SELECT * FROM curso ORDER BY curso.nombre, curso.especialidad";
$tablaDB = mysqli_query($link, $qry);

if(mysqli_num_rows($tablaDB) > 0){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Mostrar Cursos</title>
	</head>
	<body>
		<table align="center" width="400" border="0">
			<tr><td colspan="2" align="right">
				<input type="button" id="btnAgregar" name="btnAgregar" value="Agregar" onclick="javascript: window.location.href='./addCursos.php'">
				<input type="button" id="btnRegresar" name="btnRegresar" value="Regresar" style="width: 100px" onclick="javascript: window.location.href='../inicio/nada.html'">
			</td></tr>
		</table>

		<table align="center" border="1" width="400">
			<thead>
				<tr style="background-color: #BAB7BB7">
					<th width="50" height="20">Clave</th>
					<th height="20">Nombre</th>
					<th height="20">Especialidad</th>
					<th height="20">Semestre</th>
				</tr>
			</thead>
			<tbody style="overflow: auto;">
				<?php
				while ($registro = mysqli_fetch_array($tablaDB)) {
					
					$id = $registro['id'];
					$clave = $registro['clave'];
					$nombre =$registro['nombre'];
					$especialidad = $registro['especialidad'];
					$semestre = $registro['semestre'];

					echo "<tr 
							onMouseOver='javascript: this.bgColor=\"#BCF5A9\"; this.style.cursor=\"hand\";'
							onMouseOut='javascript: this.bgColor=\"#FFFFFF\"; this.style.cursor=\"default\";'
							onclick='javascript: window.location.href=\"./updCursos.php?id=$id\";'>
						<td width='50'> $clave </td>
						<td> $nombre</td>
						<td> $especialidad</td>
						<td> $semestre</td>
						</tr>";

				}
				echo "</table>
					  </body>";
		}
		else{
			echo"
			<tabLe border='0' align='center' bordercolor='#FF3333'>
			<tr><td></td></tr>
			<tr align='center'>
			<td align='center'>
					<td align='center'> <font color='#FF3333'> No existen registros en la tabla de cursos!</font></td>
					</tr>
			</table>
			</div>
			</body>";
		}

		mysqli_free_result($tablaDB);
		mysqli_close($link);

		?>
<script type="text/javascript">
	function enviar(){
		document.getElementById('txtOpc').value='add';
		window.location.href='./addCursos.php'
	}
</script>