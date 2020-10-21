$(document).ready(function(){
	$("#okCorreo").hide();
	$("#okUser").hide();
	$("#correo").change(function(){
		if ( correoValido($("#correo").val() ) ) {
			// Ocultar icono rojo
			$("#noCorreo").hide();
			// Mostrar icono verde
			$("#okCorreo").show();
		} 
		else {
			// Ocultar icono verde
			$("#okCorreo").hide();
			// Mostrar icono rojo
			$("#noCorreo").show();
		}
	});

	function correoValido(correo){
		var arroba = correo.indexOf("@");
		correo = correo.substring(arroba,correo.length);
		var punto = correo.indexOf(".");
		correo = correo.substring(punto+1,correo.length);
		return (arroba>0 && punto>1 && correo.length>0);
	}

	$("#user").change(function(){
		var url="comprobarUsuario.php?user=" + $("#user").val();
		$.get(url,usuarioExiste);
	});

	function usuarioExiste(data,status){
		if(data=="existe"){
			$("#okUser").hide();
			$("#noUser").show();
			alert("Ese usuario ya existe");
		}
		else{
			$("#okUser").show();
			$("#noUser").hide();
		}
	}

});


