<?php
session_start();

	if(empty($_SESSION['usr'])){
    echo "Debe auteniticarse";
    exit();
  }

  include '../bd/conexion.php';
  $qry = 'SELECT * FROM calificacion ORDER BY calificacion.matricula;';

  $tablaBD = mysqli_query($link, $qry);

  //si existen registros crear table
  if( mysqli_num_rows($tablaBD)>0){
  	//crear el encabezado de la tabla
  	?>
  	<!DOCTYPE html>
  	<html>
  	<head>
  		<title>shw Calificaciones</title>
  	</head>
  	<body>
  		<table align='center' width='400' border='0'>
  			<tr>
  				<td colspan='2' align='center'>
  					<input type='hidden' name='txtOpc' id='txtOpc'>
  					<input type='button' name='btnAgregar' id='btnAgregar' value='Agregar'
  					onClick='enviar()'>

  					<input type='button' name='btnRegresar' id='btnRegresar' value='Regresar'
  					style='width: 100px';
  					onClick="javascript: window.location.href='../inicio/nada.html'">
  				</td>
  			</tr>
  		</table>
  		<table align='center' border='1' width='400'>
  			<thead>
  				<tr style='background-color: #BAB7B7'>
  					<th width='70' height='20'>Matricula</th>
  					<th height='20'>Curso</th>
            <th height='20'>Profesor</th>
            <th height='20'>Periodo</th>
            <th height='20'>Calificacion</th>
  				</tr>
  			</thead>
  			<tbody style="overflow: auto;">
  				<?php
  				//desplegar los registros de la tabla especialidades de la bd
  				while ( $registro = mysqli_fetch_array($tablaBD)) {
  					$id = $registro['id'];
  					$matricula = $registro['matricula'];
  					$curso = $registro['curso'];
            $profesor = $registro['profesor'];
            $periodo = $registro['periodo'];
            $calif = $registro['calif'];
  					echo "<tr
  							onMouseOver='javascript:this.bgColor=\"#bcf5a9\";
  							this.style.cursor=\"pointer\";'

  							onMouseOut='javascript:this.bgColor=\"#ffffff\";
                this.style.cursor=\"default\";'

  							onclick='javascript:window.location.href=\"./updCalificaciones.php?matricula=$matricula\";'>

								<td width='50'>$matricula</td>
								<td>$curso</td>
                <td>$profesor</td>
                <td>$periodo</td>
                <td>$calif</td>
							</tr>";
  				}
  			//echo "	</table>
  					//</tbody>";
  			}
  			else{
  				//notificar que no existe registros en la tabla especialidades
  				echo "
  				<table border='0' align='center' bordercolor='#ff3333'>
  					<tr>
  						<td></td>
  					</tr>
  					<tr align='center'>
  						<td align='center'><font color='#ff3333'>No existen registros en la tabla de Calificaciones!!</font></td>
  					</tr>
  				</table>
  			</body>
  			";
  		}
	//cerrar la conexion a la bd
	mysqli_free_result($link, $tablaBD);// libera los registros de la tabla
	mysqli_close($link);
				?>

  			</tbody>
  			</table>


  		</body>
	


<script type='text/javascript'>
	function enviar(){
		document.getElementById('txtOpc').value='add';
		window.location.href = 'addCalificaciones.php';
	}
</script>
</html>