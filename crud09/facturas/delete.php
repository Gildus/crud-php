<?php
require_once '../login.php';
require_once '../include/Usuario.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idUsuario = (int)$_GET['id'];
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

if( isset($_POST['id']) && !empty($_POST['id']) ) {
	
		$idUsuario = $_POST['id'];
				
		$objectoUsuario = new Usuario();
		$todobien = $objectoUsuario->eliminarUsuario($idUsuario );
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo eliminar ...';
		}
		
		echo $mensaje;
	
}


$oUsuario = new Usuario();
$usuario = $oUsuario->getUsuarioById($idUsuario);


?>

		
		
		<h1>Eliminando Usuario</h1>
		<form action="delete.php?id=<?php echo $idUsuario;?>" method="post">
			<input type="hidden" name="id" value="<?php echo $idUsuario;?>" />			
			Desea realmente eliminar el usuario: <?php echo $usuario['nombres'];?> 
			<button type="submit">SI</button>
			<button type="button" onclick="location.href='index.php';">NO</button>
			?
		</form>
		
		
		
	</section>
	
	<?php include '../footer.php';?>

</body>
</html>