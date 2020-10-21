<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Registro</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="validar.js"></script> 
</head>

<body>

<div id="contenedor">

	<?php 
		require("cabecera.php"); 
		require("sidebarIzq.php"); 
	?>

	<div id="contenido">
	<h1>Registro de nuevo usuario</h1>
	<form action="index.php" method="POST">
		<fieldset>
			<legend>Datos del usuario</legend>
			<p><label>Correo:</label> <input type="text" name="correo" id="correo" /> <img id="noCorreo" src="./iconos/no.png"> <img id="okCorreo" src="./iconos/ok.png"></p>
			<p><label>User:</label> <input type="text" name="user" id="user" /><img id="noUser" src="./iconos/no.png"> <img id="okUser" src="./iconos/ok.png"></p>
			<p><label>Password:</label> <input type="password" name="password" id="password" /></p>
			<button type="submit">Enviar</button>
		</fieldset>
	</form>	
	</div>

	<?php 
		include("sidebarDer.php"); 
		include("pie.php"); 
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>