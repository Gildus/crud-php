<?php
require_once '../login.php';
require_once '../include/Cliente.php';
require_once '../include/FacturaDet.php';
require_once '../include/FacturaEnc.php';

if(!isset($_GET['id'])) {
	header('Location: index.php');
	exit;
}

$idFacturaDet = (int) $_GET['id'];

$objectoFacturaDet = new FacturaDet();

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
	&& isset($_POST['idfacturadet']) && !empty($_POST['idfacturadet'])  
	&& isset($_POST['descripcion']) && !empty($_POST['descripcion']) 	
	) {
	
		$idfacturaenc = (int)$_POST['idfacturaenc'];
		$idfacturadet = (int)$_POST['idfacturadet'];
		$descripcion = $_POST['descripcion'];
		$monto = (float)$_POST['monto'];
		
		
		
		$todobien = $objectoFacturaDet->guardarEdicionDetalle($idfacturadet, $descripcion, $monto);
		
		if($todobien){
			header('Location: ver.php?id='.$idfacturaenc);
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo guardar ...';
		}
		
		echo $mensaje;
	
}


$datosDetalle = $objectoFacturaDet->getDetalleFacturaById($idFacturaDet);

//var_dump($datosDetalle);



?>				
		<h1>Editando Item de Factura</h1>
		<form action="edit_item.php?id=<?php echo $idFacturaDet; ?>" method="post">			
			<input type='hidden' name='idfacturaenc' value='<?=$datosDetalle['idfacturaenc'];?>' />
			<input type='hidden' name='idfacturadet' value='<?=$idFacturaDet;?>' />
			<table class='tabla' border="0">
				<tr>
					<td>Descripción: </td>
					<td><input type="text" name="descripcion" id="descripcion" value="<?=$datosDetalle['descripcion'];?>"/></td>
				</tr>
				<tr>
					<td>Monto: </td>
					<td>
						<input type="text" name="monto" id="monto" value='<?=$datosDetalle['monto'];?>'/>
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<button type="submit">Guardar Edición</button>
					</td>
					
				</tr>
				
			</table>
		</form>
		
		
		
	</section>
	
	<?php include '../footer.php';?>

</body>
</html>