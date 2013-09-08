<?php

session_start();
/*
* Consultamos si existe la session inicializada al momento de autenticar
*/
if(isset($_SESSION['nick']) && !empty($_SESSION['nick'])) {

	header('Location: main.php');
	exit;
}

?>
<!doctype>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejemplo de Login</title>
	<link href="css/index.css" media="screen" rel="stylesheet" type="text/css">
	<script src="js/index.js" type="text/javascript"></script>
</head>
<body>
<?php
require_once 'include/Login.php';	
if(isset($_POST['usuario']) && isset($_POST['clave']) && !empty($_POST['usuario']) && !empty($_POST['clave'])) {
	
	$usu = htmlentities($_POST['usuario'], ENT_QUOTES);
	$pass = htmlentities($_POST['clave'], ENT_QUOTES);
	
	$login = new Login();
	$existe = $login->verificarAccesos($usu,$pass);
		
	if($existe) {
		
		$_SESSION['nick'] = $existe[0]['nombres'];
		$_SESSION['IdUsu'] = $existe[0]['id'];
		header('Location: main.php');
		exit;
	
	} else {
		echo '<p class="error">Error de ingreso, vuelva ha interntarlo...</p>';		
	}
	
	
}
?>

	<form action='index.php' method='post' onsubmit='return validarFormulario(this);'>
		<div class='controles_ingreso'>
			<label for='usuario'>Usuario:</label>
			<input type='text' id='usuario' name='usuario'  />
		</div>
		
		<div class='controles_ingreso'>
			<label for='clave'>Password: </label>
			<input type='password' id='clave' name='clave'  />
		</div>
		
		<div class='controles_evento'>
			
			<button type='submit'>Ingresar</button>
		</div>
		
	</form>

</body>

</html>