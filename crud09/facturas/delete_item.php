<?php
require_once '../login.php';
require_once '../include/FacturaDet.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idFacturaDet = (int)$_GET['id'];
}
else {
	header("Location: index.php");
	exit;
}


$objecto = new FacturaDet();

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

if( isset($_POST['id']) && !empty($_POST['id']) &&  isset($_POST['idfacturaenc']) && !empty($_POST['idfacturaenc']) ) {
	
		$idFacturaDet = (int)$_POST['id'];
		$idFacturaEnc = (int)$_POST['idfacturaenc'];
		
		$todobien = $objecto->eliminarDetalle($idFacturaDet );
		if($todobien){
			header('Location: ver.php?id='.$idFacturaEnc);
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo eliminar ...';
		}
		
		echo $mensaje;
	
}

$detalle = $objecto->getDetalleFacturaById($idFacturaDet);

?>

		
		
		<h1>Eliminando Detalle de Factura</h1>
		<form action="delete_item.php?id=<?php echo $idFacturaDet;?>" method="post">
			<input type="hidden" name="id" value="<?php echo $idFacturaDet;?>" />			
			<input type="hidden" name="idfacturaenc" value="<?php echo $detalle['idfacturaenc'];?>" />
			
			Desea realmente eliminar el item de factura:  
			<button type="submit">SI</button>
			<button type="button" onclick="location.href='index.php';">NO</button>
			?
		</form>
		
		
		
	</section>
	
	<?php include '../footer.php';?>

</body>
</html>