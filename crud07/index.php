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
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejemplo de Login</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
	
	
	<link href="css/bootstrap.min.css" rel="stylesheet" >		
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" >	
	<link href="css/index.css" rel="stylesheet" >
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/index.js" type="text/javascript"></script>
</head>
<body>
	<div class="container">
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
		?>
<div class="alert alert-block alert-error fade in" style="max-width: 220px; margin: 0px auto 20px;">
	<button data-dismiss="alert" class="close" type="button">×</button>
	<strong>Error de Ingreso!</strong> No tiene acceso, por favor verifique que los accesos sean los correctos.
</div>		
		<?php
	}
	
	
}
?>
	
		
		<form  class="form-signin" action='index.php' method='post' onsubmit='return validarFormulario(this);'>
			<h2 class="form-signin-heading">Ingreso</h2>

			<input type='text' id='usuario' name='usuario' placeholder="Usuario"  />
			<label for='clave'>Password: </label>
			<input type='password' id='clave' name='clave'  placeholder="Clave" />
			<button type='submit' class="btn btn-large btn-primary">Ingresar</button>

		</form>
		
	</div>

</body>

</html>