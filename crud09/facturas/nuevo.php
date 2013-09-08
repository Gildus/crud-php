<?php
require_once '../login.php';
require_once '../include/Cliente.php';
require_once '../include/FacturaEnc.php';
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

if( isset($_POST['nro_factura']) && !empty($_POST['nro_factura']) 
	&& isset($_POST['idcliente']) && !empty($_POST['idcliente']) 
	) {
	
		$nro_factura = $_POST['nro_factura'];
		$idcliente = $_POST['idcliente'];
		$detalle = $_POST['detalle'];
		
		
		$objectoFacturaEnc = new FacturaEnc();
		// Verificamos.
		
		$todobien = $objectoFacturaEnc->guardarFactura($nro_factura, $idcliente, $detalle);
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo guardar ...';
		}
		
		echo $mensaje;
	
}

?>

<?php 
$cliente = new Cliente();
$lstCliente = $cliente->obtenerTodos();
?>				
		<h1>Adicionando Nuevo Factura</h1>
		<form action="nuevo.php" method="post">			
			<table class='tabla' border="0">
				<tr>
					<td>Nro. Factura: </td>
					<td><input type="text" name="nro_factura" id="nro_factura"/></td>
				</tr>
				<tr>
					<td>Cliente: </td>
					<td>
						<select name='idcliente' id="idcliente">
						<?php foreach($lstCliente as $cliente) {?>
							<option value='<?=$cliente['idcliente'];?>'>
								<?=$cliente['nombre_cliente'];?>
							</option>
						<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Observaciones: </td>
					<td>
						<textarea name="detalle"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<button type="submit">Guardar</button>
					</td>
					
				</tr>
				
			</table>
		</form>
		
		
		
	</section>
	
	<?php include '../footer.php';?>

</body>
</html>