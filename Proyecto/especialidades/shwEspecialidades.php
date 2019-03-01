<?php
  session_start();

  if(empty($_SESSION['usr'])){
    echo "Debe autentificarse";
    exit();
  }

  include '../bd/conexion.php';
  $qry = "SELECT * FROM especialidad ORDER BY expecialidad.clave";

  $tablaBD  =mysqli_query($link, $qry);

  //Si existen registros crea la tabla
  if(mysqli_num_rows($tablaBD) > 0){
    //Crear el encabezado de la tabla
    ?>

    <html lang="en" dir="ltr">
      <head>
        <title>MSB shwEspecialidades</title>
      </head>
      <body>
        <table align='center' width='400' border='0'>
          <tr>
            <td colspan="2" align='right'>
              <input type="button" name="btnAgregar" value="Agregar" id="btnAgregar" onclick='enviar()'>
              <input type="button" name="btnRegresar" value="Regresars" id="btnRegresar" style="width: 100px" onclick="javascript: window.location.href='../inicio/nada.html'">
            </td>
          </tr>
        </table>

        <table align='center' border="1" width='400'>
          <thead>
            <tr style="background-color: 'orange'">
              <th width="50" height='20'>Clave</th>
              <th height='20'>Nombre</th>
            </tr>
          </thead>
           <tbody style="overflow:auto;">
             <?php
              //Desplegar los registros de la tabla especialidades en bd
              while($registro = mysqli_fetch_array($tablaBD)){
                $id = $registro['id'];
                $clave = $registro['clave'];
                $nombre = $registro['nombre'];

                //Dando estilo a cada una de las celdas creadas
                echo "<tr onMouseOver='javascript: this.bgColor=\"#8CF5A9\"; this.style.cursor=\"hand\";'
                onMouseOut='javascript: this.bgColor=\"#FFFFFF\"; this.style.cursor=\"default\";'
                onClick='javascript: window.location.href=\"./updEspecialidades.php?id=$id\"'>
                <td width='50'>$clave</td>
                <td>$nombre</td>
                </tr>";
              }
              echo "</table>
                    </body>";

  }//end if principal de php
  else
  {
    //Notificar que no existen registros en la tabla de especialidades
    echo "<table border ='0' align='center' bordercolor='#FF3333'>
    <tr><td></td></tr>
    <tr> align='center'>
      <td> align='center'><font color = '#FF3333'>No existen registros en la tabla de Especialidades!</font></td>
    </table>
    </div>
    </body>";
  }

  //Cerrar la conexión a la base de datos
  mysqlil_free_result($link, $tablaBD);//Liberar los registros de la tabla
  mysqli_close($link);
  ?>

  <script type='text/javascript'>
    fucntion enviar(){
      document.getElemtById('txtOpc').value = 'add';
      window.location.href = 'addEspecialidades.php';
    }
  </script>
