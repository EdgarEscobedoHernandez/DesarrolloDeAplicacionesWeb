<?php
  session_start();
  if(empty($_SESSION['usr'])){
    echo "Debe autenticarse";
    exit();
  }

  include '../bd/conexiones.php';

  //obtener el id para recuperar el registro correspondiente
  $id = $_GET['id'];

  //obtener la colección de registros que corresponde al id enviado
  $strQry = "SELECT * FROM especialidad WHERE id = '$id'";

  //ejecutar la consulta
  $tablaBD = mysqli_query($link, $strQry);

  //Sacar los datos de la tabla de registros intermedios
  $registro = mysqli_fetch_array($tablaBD);
  $nombre = $registro['nombre'];

  //Construir el html de la interfaz para la opción de modificar
  echo "
  <html>
  <head>
    <title></title>
    <script type = 'text/javascript'>
     fcuntion enviar (opc){

       if(opc == 'regresar'){
         window.location = 'shwEspecialidades.php';
       }

       document.getElementById('txtId').value = '". $id ."';


       if(opc == 'upd'){
         document.getElementById('txtOpc').value = 'upd';
       } else if(opc == 'del'){
         document.getElementById('txtOpc').value = 'del';
       }

       document.getElementById('frmUpdEspecialidades').submit();

     }
     </script>
   </head>
   <body>
   <form name = 'frmUpdEspecialidades' id = 'frmUpdEspecialidades' action = './qryEspecialidades.php' method = 'POST'>
    <table align='center' width='400' border='0'>
      <tr height='100'>
        <td colspan='2' align='center'><b>Modificando Especialidades</b></td>
      </tr>
      <tr>
        <td align='right' width = '200'>Id:&nbps&nbsp</td>
        <td> $id </td>
      </tr>
      <tr>
        <td align='right' width = '200'>Nombre:&nbps&nbsp</td>
        <td><input type='text' id='txtNombre' name='txtNombre' value='$nombre' autofocus></td>
      </tr>

      <tr height='80'>
        <td colspan = '2' align = 'center'>
        <input type='button' id = 'btnGrabar' name = 'btnGrabar' value = 'Grabar' style = 'width: 100px' onClick = 'enviar(\"upd\")'>
        <input type='button' id = 'btnEliminar' name = 'btnEliminar' value = 'Eliminar' style = 'width: 100px' onClick = 'enviar(\"del\")'>
        <input type='button' id = 'btnRegresar' name = 'btnRegresar' value = 'Regresar' style = 'width: 100px' onClick = 'enviar(\"regresar\")'>
      </tr>
    </table>
    <input type='hidden' id='txtOpc' name='txtOpc'>
    <input type='hidden' id='txtId' name='txtId'>
  </html>
  ";
?>
