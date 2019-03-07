//funciones de js
function grabar(opc){
	switch(opc){
	case 'especialidades':
		document.getElementById("txtOpc").value = 'add';
		if(document.getElementById("txtClave").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtClave").focus();
			return false;
		}
		if (document.getElementById("txtNombre").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtNombre").focus();
			return false;
		}
		document.getElementById("frmAddEspecialidades").submit();
		break;

	case 'profesores':
		document.getElementById("txtOpc").value = 'add';
		if(document.getElementById("txtClave").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtClave").focus();
			return false;
		}
		if (document.getElementById("txtNombre").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtNombre").focus();
			return false;
		}
		if (document.getElementById("txtPaterno").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtPaterno").focus();
			return false;
		}
		if (document.getElementById("txtMaterno").value == '') {
			alert('Error en los datos reviselos!');
			document.getElementById("txtMaterno").focus();
			return false;
		}
		document.getElementById("frmAddProfesores").submit();
		break;
	}
	
}