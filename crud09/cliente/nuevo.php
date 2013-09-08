<?php
require_once '../login.php';
require_once '../include/Cliente.php';
?>
<!doctype>
<html>
<head>
	<meta charset="utf-8">
	<title>Intranet</title>
	<link href="../css/usuario.css" media="screen" rel="stylesheet" type="text/css">
	<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="../js/usuario.js" type="text/javascript"></script>
</head>
<body>
	<?php include '../header.php';?>
	
	<section>
		


<?php

if( isset($_POST['nc']) && !empty($_POST['nc']) 
	&& isset($_POST['s']) && !empty($_POST['s']) 	
	) {
	
		$nombre_cliente = $_POST['nc'];
		$status = $_POST['s'];
		
		
		$objectoCliente = new Cliente();
		$todobien = $objectoCliente->guardarNuevosDatos($nombre_cliente, $status);
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo guardar ...';
		}
		
		echo $mensaje;
	
}

?>

		
		
		<h1>Adicionando Nuevo Cliente</h1>
		<form id="frmNuevo" action="nuevo.php" method="post">
			<table class='tabla' border="0">
				<tr>
					<td>Nombre Cliente: </td>
					<td><input type="text" name="nc" id="nc"/></td>
				</tr>
				<tr>
					<td>Estado: </td>
					<td>
						<select id='s' name='s'>
							<option value='E'>Habilitado</option>
							<option value='D'>Deshabilitado</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<button id="btnGuardar" type="button">Guardar</button>
					</td>
					
				</tr>
				
			</table>
		</form>
		
		
		
	</section>
	
	<?php include '../footer.php';?>

</body>
</html>