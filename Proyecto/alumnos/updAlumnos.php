<?php

session_start();
  if(empty($_SESSION['usr'])){
    echo "Debe auteniticarse";
        exit();
  }
  
  include '../bd/conexion.php';

  //obtenet el id para recuperar el registro
  $id = $_GET['id'];

  //obtener la coleccion de registros que corresponden al id enviad
  $strQry = "SELECT * FROM alumnos WHERE id=$id;";

  //ejecutar la consulta
  $tablaBD = mysqli_query($link, $strQry);

  //sacar los datos de la tabla de registros intermedios
  $registro = mysqli_fetch_array($tablaBD);
  $nombre = $registro['nombre'];

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
                    document.getElementById('txtId').value = '".$id."';
                    document.getElementById('frmUpdAlumnos').submit();
                break;

                case 'del':
                    document.getElementById('txtOpc').value = 'del';
                    document.getElementById('txtId').value = '".$id."';
                    document.getElementById('frmUpdAlumnos').submit();
                break;

                case 'regresar':
                    window.location.href = './shwAlumnos.php';
                break;
            }
            
        }
    </script>
  </head>
  <body>
    <form  name='frmUpdalumnos' id='frmUpdAlumnos' action='./qryAlumnos.php' method='POST'>
        <table align='center' width='400' border='0'>
            <tr height='100'>
                <td colspan='2' align='center'>
                    <b>Modificando Alumnos</b>
                </td>
            </tr>

            <tr>
                <td align='right' width='200'>Id:&nbsp&nbsp</td>
                <td><input type='text' name='txtId' id='txtId' value='$id' autofocus></td>
            </tr>

             <tr>
                <td align='right' width='200'>Matricula:&nbsp&nbsp</td>
                <td><input type='text' name='txtMatricula' id='txtMatricula' value='$matricula' autofocus></td>
            </tr>

            <tr>
                <td align='right'>Nombre:&nbsp&nbsp</td>
                <td><input type='text' name='txtNombre' id='txtNombre' value='$nombre' autofocus></td>
            </tr>

             <tr>
                <td align='right' width='200'>Paterno:&nbsp&nbsp</td>
                <td><input type='text' name='txtPaterno' id='txtPaterno' value='$paterno' autofocus></td>
            </tr>

             <tr>
                <td align='right' width='200'>Materno:&nbsp&nbsp</td>
                <td><input type='text' name='txtMaterno' id='txtMaterno' value='$materno' autofocus></td>
            </tr>

             <tr>
                <td align='right' width='200'>Especialidad:&nbsp&nbsp</td>
                <td><input type='text' name='txtEspecialidad' id='txtEspecialidad' value='$especialidad' autofocus></td>
            </tr>

             <tr>
                <td align='right' width='200'>Fingreso:&nbsp&nbsp</td>
                <td><input type='text' name='txtFingreso' id='txtFingreso' value='$fingreso' autofocus></td>
            </tr>

            <tr height='80'>
                <td colspan='2' align='center'>
                    
                    <input type='hidden' name='txtOpc' id='txtOpc'>
                    <input type='hidden' name='txtId' id='txtId'>

                    <input type='button' name='btnGrabar' id='btnGrabar' value='Grabar' style='width: 100px' onclick='enviar(\"upd\")'>
                    
                    <input type='button' name='btnEliminar' id='btnEliminar' value='Eliminar' style='width: 100px' onclick='enviar(\"del\")'>
                    
                    <input type='button' name='btnRegresar' id='btnRegresar' value='Regresar' style='width: 100px' onclick='enviar(\"regresar\")'>
                </td>
            </tr>
        </table>
        
    </form>
  </body>
  </html>
  ";
?>