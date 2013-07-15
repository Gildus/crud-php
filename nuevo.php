<?php
require_once 'login.php';
require_once 'include/Usuario.php';
?>
<!doctype>
<html>
<head>
	<meta charset="utf-8">
	<title>Intranet</title>
	<link href="css/usuario.css" media="screen" rel="stylesheet" type="text/css">
	<script src="js/usuario.js" type="text/javascript"></script>
</head>
<body>
	<header>
		<div>Bienvenido <?php echo $_SESSION['nick'];?></div>
		<nav>
			<a href="salir.php">Cerrar Sesión</a>
		</nav>
	</header>
	
	<section>
		<menu>
			<ul>
				<li>
					<a href="usuario.php">Tabla de Usuario</a>
				</li>
				<li>
					<a href="#">Otra Tabla 1</a>
				</li>
				<li>
					<a href="#">Otra Tabla 2</a>
				</li>
			</ul>
		</menu>


<?php

if( isset($_POST['usu']) && !empty($_POST['usu']) 
	&& isset($_POST['pass']) && !empty($_POST['pass']) 
	&& isset($_POST['nom']) && !empty($_POST['nom'])  
	&& isset($_POST['email']) && !empty($_POST['email']) 
	) {
	
		$usuario = $_POST['usu'];
		$password = $_POST['pass'];
		$nombres = $_POST['nom'];
		$email = $_POST['email'];
		
		$objectoUsuario = new Usuario();
		$todobien = $objectoUsuario->guardarNuevosDatos($usuario, $password, $nombres, $email );
		if($todobien){
			header('Location: usuario.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo guardar ...';
		}
		
		echo $mensaje;
	
}

?>

		
		
		<h1>Adicionando Nuevo Usuario</h1>
		<form action="nuevo.php" method="post">
			<table class='tabla' border="0">
				<tr>
					<td>Usuario: </td>
					<td><input type="text" name="usu" id="usu"/></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" name="pass" id="pass"/></td>
				</tr>
				<tr>
					<td>Nombres: </td>
					<td><input type="text" name="nom" id="nom"/></td>
				</tr>
				<tr>
					<td>E-mail: </td>
					<td><input type="text" name="email" id="email"/></td>
				</tr>

				<tr>
					<td colspan="2">
						<button type="submit">Guardar</button>
					</td>
					
				</tr>
				
			</table>
		</form>
		
		
		
	</section>
	
	<footer>
		<hr/>
		Intranet - Cimas &copy 2013
	</footer>

</body>
</html>