<?php
  session_start();

  	if(empty($_SESSION['usr'])){
      echo "Debe auteniticarse";
      exit();
    }

    include '../bd/conexion.php';
    $qry = 'SELECT alumno.matricula, alumno.nombre, alumno.paterno, alumno.materno, especialidad.nombre especialidad 
    FROM alumno, especialidad 
    WHERE alumno.especialidad = especialidad.clave;';
    $tablaBD = mysqli_query($link, $qry);

    if(mysqli_num_rows($tablaBD)>0){
      //crear el encabezado de la tabla
      ?>
      <!DOCTYPE html>
      <html>
      <head>
        <title>shw Especialidades</title>
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
              <th width='50' height='20'>Matricula</th>
              <th height='20' width='50' >Nombre</th>
              <th height = '20'>Paterno</th>
              <th height = '20'>Materno</th>
              <th height = '20'>Especialidad</th>
            </tr>
          </thead>
          <tbody style="overflow: auto;">
            <?php
            //desplegar los registros de la tabla especialidades de la bd
            while ($registro = mysqli_fetch_array($tablaBD)) {

              $matricula = $registro['matricula'];
              $nombre = $registro['nombre'];
              $paterno = $registro['paterno'];
              $materno = $registro['materno'];
              $fingreso = $registro['especialidad'];



              echo "<tr
                  onMouseOver='javascript:this.bgColor=\"#bcf5a9\";
                  this.style.cursor=\"pointer\";'

                  onMouseOut='javascript:this.bgColor=\"#ffffff\";
                this.style.cursor=\"default\";'

                  onclick='javascript:window.location.href=\"./updAlumnos.php?matricula=$matricula\";'>

                  <td width='50'>$matricula</td>
                  <td width = '50'>$nombre</td>
                  <td>$paterno</td>
                  <td>$materno</td>
                  <td>$fingreso</td>
                </tr>";
            }
    }else{
      //notificar que no existe registros en la tabla especialidades
      echo "
      <table border='0' align='center' bordercolor='#ff3333'>
        <tr>
          <td></td>
        </tr>
        <tr align='center'>
          <td align='center'><font color='#ff3333'>No existen egistros en la tabla de Especialidades!!</font></td>
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
window.location.href = 'addAlumnos.php';
}
</script>
</html>
