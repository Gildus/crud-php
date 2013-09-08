<?php
require_once '../login.php';
require_once '../include/FacturaEnc.php';
require_once '../include/Cliente.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idFacturaEnc = (int)$_GET['id'];
	$oFacturaEnc = new FacturaEnc();
}
else {
	header("Location: index.php");
	exit;
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>CIMAS - 35068 - Intranet</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <?php include '../header.php';?>
	
	  <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1>Eliminando Factura</h1>
        </div>
        <p class="lead">Confirme si realmente desea eliminar, no podrá ser recuperado....</p>
		



<?php

if( isset($_POST['id']) && !empty($_POST['id']) ) {
	
		$idFacturaEnc = (int)$_POST['id'];
				
		$todobien = $oFacturaEnc->eliminarFacturaEnc($idFacturaEnc );
		if($todobien==TRUE){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = '<div class="alert alert-danger">Lo sentimos, no se pudo eliminar ...</div>';
		}
		
		echo $mensaje;
	
}



$factura = $oFacturaEnc->getFacturaEncById($idFacturaEnc);
if($factura) {
	$oCliente = new Cliente();
	$cliente = $oCliente->getClienteById($factura['idcliente']);
} else {
	die('Error de ingreso.');
}

?>

		
		
		<div class="alert alert-warning">
		<form action="delete.php?id=<?php echo $idFacturaEnc;?>" method="post" class="form-inline" role="form">
			<input type="hidden" name="id" value="<?php echo $idFacturaEnc;?>" />			
			Desea realmente eliminar la factura <b><?php echo $factura['nro_factura'];?> </b> del cliente <b><?php echo $cliente['nombre_cliente'];?> </b>
			<button type="submit"  class="btn btn-danger">SI</button>
			<button type="button" onclick="location.href='index.php';"  class="btn btn-default" >NO</button> ?
		</form>
		</div>
		
		
		</div>
    </div>

    
	<?php include '../footer.php';?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/cliente.js" type="text/javascript"></script>
  </body>
</html>	