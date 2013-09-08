<?php
require_once '../login.php';
require_once '../include/Usuario.php';


if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idUsuario = (int)$_GET['id'];
	
	$objectoUsu = new Usuario();
	$usuario = $objectoUsu->getUsuarioById($idUsuario);
	
}
else {
	header("Location: index.php");
	exit;
}


?>
<!doctype>
<html>
<head>
	<meta charset="utf-8">
	<title>Intranet</title>
	<link href="../css/usuario.css" media="screen" rel="stylesheet" type="text/css">
	<script src="../js/usuario.js" type="text/javascript"></script>
</head>
<body>
	<?php include '../header.php';?>
	
	<section>
		


<?php

if( isset($_POST['id']) && !empty($_POST['id']) 
	&& isset($_POST['usu']) && !empty($_POST['usu']) 	
	&& isset($_POST['nom']) && !empty($_POST['nom'])  
	&& isset($_POST['email']) && !empty($_POST['email']) 
	) {
	
		$id = (int)$_POST['id'];
		$usuario = $_POST['usu'];
		
		$password = null;
		if( isset($_POST['pass']) && !empty($_POST['pass']) )		$password = $_POST['pass'];
		
		$nombres = $_POST['nom'];
		$email = $_POST['email'];
		
		$objectoUsuario = new Usuario();
		$todobien = $objectoUsuario->guardarEdicionDatos($id ,$usuario, $password, $nombres, $email );
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo guardar ...';
		}
		
		echo $mensaje;
	
}

?>

		
		
		<h1>Editando Usuario</h1>
		<form action="edit.php?id=<?php echo $idUsuario;?>" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $idUsuario;?>"/>
			<table class='tabla' border="0">
				<tr>
					<td>Usuario: </td>
					<td><input type="text" name="usu" id="usu" value="<?php echo $usuario['usuario'];?>"/></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" name="pass" id="pass" value=""/></td>
				</tr>
				<tr>
					<td>Nombres: </td>
					<td><input type="text" name="nom" id="nom" value="<?php echo $usuario['nombres'];?>"/></td>
				</tr>
				<tr>
					<td>E-mail: </td>
					<td><input type="text" name="email" id="email" value="<?php echo $usuario['correo'];?>"/></td>
				</tr>

				<tr>
					<td colspan="2">
						<button type="submit">Guardar</button> 
						<button type="button" onclick="location.href='index.php';">cancelar</button>
					</td>
					
				</tr>
				
			</table>
		</form>
		
		
		
	</section>
	
	<?php include '../footer.php';?>

</body>
</html>