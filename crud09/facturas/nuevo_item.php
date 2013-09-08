<?php
require_once '../login.php';
require_once '../include/Cliente.php';
require_once '../include/FacturaDet.php';
require_once '../include/FacturaEnc.php';

if(!isset($_GET['id'])) {
	header('Location: index.php');
	exit;
}

$idFacturaEnc = (int) $_GET['id'];

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

if( isset($_POST['idfacturaenc']) && !empty($_POST['idfacturaenc']) 
	&& isset($_POST['descripcion']) && !empty($_POST['descripcion']) 	
	) {
	
		$idfacturaenc = (int)$_POST['idfacturaenc'];
		$descripcion = $_POST['descripcion'];
		$monto = (float)$_POST['monto'];
		
		
		$objectoFacturaDet = new FacturaDet();
		$todobien = $objectoFacturaDet->guardarFacturaDetalle($idfacturaenc, $descripcion, $monto);
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo guardar ...';
		}
		
		echo $mensaje;
	
}

?>
			
		<h1>Adicionando Nuevo Item en Factura</h1>
		<form action="nuevo_item.php?id=<?php echo $idFacturaEnc; ?>" method="post">			
			<input type='hidden' name='idfacturaenc' value='<?=$idFacturaEnc;?>' />
			<table class='tabla' border="0">
				<tr>
					<td>Descripción: </td>
					<td><input type="text" name="descripcion" id="descripcion"/></td>
				</tr>
				<tr>
					<td>Monto: </td>
					<td>
						<input type="text" name="monto" id="monto"/>
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