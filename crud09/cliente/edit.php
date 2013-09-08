<?php
require_once '../login.php';
require_once '../include/Cliente.php';


if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idCliente = (int)$_GET['id'];
	
	$objectoCliente = new Cliente();
	$cliente = $objectoCliente->getClienteById($idCliente);
	
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
	&& isset($_POST['nombre_cliente']) && !empty($_POST['nombre_cliente']) 		
	) {
	
		$id = (int)$_POST['id'];
		$nombre_cliente = $_POST['nombre_cliente'];
				
		$todobien = $objectoCliente->guardarEdicionDatos($id ,$nombre_cliente);
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo guardar ...';
		}
		
		echo $mensaje;
	
}

?>

		
		
		<h1>Editando Cliente</h1>
		<form action="edit.php?id=<?php echo $idCliente;?>" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $idCliente;?>"/>
			<table class='tabla' border="0">
				<tr>
					<td>Nombre Cliente: </td>
					<td><input type="text" name="nombre_cliente" id="nombre_cliente" value="<?php echo $cliente['nombre_cliente'];?>"/></td>
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