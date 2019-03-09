<?php
	session_start();
	if(empty($_SESSION['usr']))	{
		echo "Debe autentificarse!";
		exit();
	}

	include '../bd/conexion.php';

	$qry = 'SELECT clave, nombre FROM especialidad;';
	$result = $link->query($qry); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['nombre']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}
?>

<html>

<head>
    <title>Agrega alumnos</title>
</head>

<body>
    <form id='frmAddAlumnos' action='./qryAlumnos.php' method='POST'>
        <table align='center' border='0'>
            <tr height='50'>
                <td colspan='2' align='center'>
                    <b>Agregando alumnos</b>
					<input type='hidden' id='txtOpc' name='txtOpc' value='add'>
					<input type='hidden' id='txtId' name='txtId' value=''>
                </td>
            </tr>
            <tr>
                <td>Matricula</td>
				<td><input type='text' id='txtMatricula' name='txtMatricula' maxlength="8" autofocus></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><input type='text' id='txtNombres' name='txtNombres' maxlength="20" autofocus=""></td>
            </tr>
            <tr>
                <td>Paterno</td>
                <td><input type='text' id='txtPaterno' name='txtPaterno' maxlength="20" autofocus=""></td>
            </tr>
            <tr>
                <td>Materno</td>
                <td><input type='text' id='txtMaterno' name='txtMaterno' maxlength="20" autofocus=""></td>
            </tr>
            <tr>
				<td>Especialida</td>
				<td><select name="especialidad" id="especialidad" onchange="myFuncion()"><?php echo $combobit; ?></select></td>
			</tr>
			<tr>
				<td>Fecha de ingreso</td>
				<td><input type="text" name="date" id="date" alt="date" class="IP_calendar" title="Y/m/d"></td>
			</tr>
        </table>
        <table align='center'>￼ 
            <tr height='50px'>￼
                <td align='center'>￼
				<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick="javascript: grabar('alumnos');">
                </td>
                <td colspan='2' align='center'>
                    <input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px'
                        onClick="javascript: window.location.href = './shwAlumnos.php';">
                </td>
            </tr>
        </table>
    </form>

</body>
<script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script>
<script type='text/javascript' src='../js/funciones.js'></script>

</html>