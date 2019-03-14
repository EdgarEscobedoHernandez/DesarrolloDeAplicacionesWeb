<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jaqui Garcia </title>
  </head>
  <body style="font-family: arial;">
    <form action="./qryAutentica.php" method="POST">
      <table align='center' border="0">
          <tr>
            <td colspan="2"><img src="../img/bannerITS.jpg" width='1003 px' height="102 px"></td>
          </tr>
      </table>
      <table align="center" border="0">
        <tr>
          <td colspan="2" align="center"><h3><b>Entrada al registro de calificaciones</b></h3></td>
        </tr>
        <tr>
          <td width="50%" align="right"><label>Usuario</label></td>
          <td><input type="text" id="txtUsuario" name="txtUsuario" autofocus></td>
        </tr>
        <tr>
          <td width="50%" align="right"><label>Contraseña</label></td>
          <td><input type="password" id="txtPwd" name="txtPwd" autofpcus></td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><button type="submit" id="btnEnviar" name="btnEnviar">Enviar</button></td>
        </tr>
      </table>
    </form>
  </body>
</html>
