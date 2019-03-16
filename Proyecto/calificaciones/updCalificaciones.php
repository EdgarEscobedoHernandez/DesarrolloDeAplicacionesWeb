<?php

session_start();
  if(empty($_SESSION['usr'])){
    echo "Debe auteniticarse";
		exit();
  }
  
  include '../bd/conexion.php';

  //obtenet el id para recuperar el registro correspondiente
  $matricula = $_GET['matricula'];

  //obtener la coleccion de registros que corresponden al id enviad
  $strQry = "SELECT * FROM calificacion WHERE matricula=$matricula;";

  //ejecutar la consulta
  $tablaBD = mysqli_query($link, $strQry);

  //sacar los datos de la tabla de registros intermedios
  $registro = mysqli_fetch_array($tablaBD);
  $curso = $registro['curso'];
  $profesor = $registro['profesor'];
  $periodo = $registro['periodo'];
  $calif = $registro['calif'];

  //contruir el html de la interface para la opcion de modificar
  echo "
  <html>
  <head>
  	<title></title>
  	<script type='text/javascript'>
  		function enviar(opc){
  			switch(opc){
  				case 'upd':
  					document.getElementById('txtOpc').value = 'upd';
  					document.getElementById('txtMatricula').value = '".$matricula."';
  					document.getElementById('frmUpdCalificaciones').submit();
  				break;

  				case 'del':
  					document.getElementById('txtOpc').value = 'del';
  					document.getElementById('txtMatricula').value = '".$matricula."';
  					document.getElementById('frmUpdCalificaciones').submit();
  				break;

  				case 'regresar':
  					window.location.href = './shwCalificaciones.php';
  				break;
  			}
  			
  		}
  	</script>
  </head>
  <body>
  	<form  name='frmUpdCalificaciones' id='frmUpdCalificaciones' action='./qryCalificaciones.php' method='POST'>
  		<table align='center' width='400' border='0'>
  			<tr height='100'>
  				<td colspan='2' align='center'>
  					<b>Modificando calificaciones</b>
  				</td>
  			</tr>
  			<tr>
  				<td align='right' width='200'>Matricula:&nbsp&nbsp</td>
  				<td>$matricula</td>
  			</tr>

        <tr>
          <td align='right'>Curso:&nbsp&nbsp</td>
          <td><input type='text' name='txtCurso' id='txtCurso' value='$curso' autofocus></td>
        </tr>

        <tr>
          <td align='right'>Profesor:&nbsp&nbsp</td>
          <td><input type='text' name='txtProfesor' id='txtProfesor' value='$profesor' autofocus></td>
        </tr>

        <tr>
          <td align='right'>Periodo:&nbsp&nbsp</td>
          <td><input type='text' name='txtPeriodo' id='txtPeriodo' value='$periodo' autofocus></td>
        </tr>

        <tr>
          <td align='right'>Calificacion:&nbsp&nbsp</td>
          <td><input type='text' name='txtCalif' id='txtCalif' value='$calif' autofocus></td>
        </tr>

  			<tr height='80'>
  				<td colspan='2' align='center'>
  					
  					<input type='hidden' name='txtOpc' id='txtOpc'>
  					<input type='hidden' name='txtMatricula' id='txtMatricula'>

  					<input type='button' name='btnGrabar' id='btnGrabar' value='Grabar' style='width: 100px' onClick='enviar(\"upd\")'>
  					
  					<input type='button' name='btnEliminar' id='btnEliminar' value='Eliminar' style='width: 100px' onClick='enviar(\"del\")'>
  					
  					<input type='button' name='btnRegresar' id='btnRegresar' value='Regresar' style='width: 100px' onClick='enviar(\"regresar\")'>
  				</td>
  			</tr>
  		</table>
  		
  	</form>
  </body>
  </html>
  ";
?>