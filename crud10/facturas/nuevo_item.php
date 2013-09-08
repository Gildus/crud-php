<?php
require_once '../login.php';
require_once '../include/Cliente.php';
require_once '../include/FacturaDet.php';
require_once '../include/FacturaEnc.php';

if(!isset($_GET['id'])) {
	header('Location: index.php');
	exit;
}

$idFacturaEnc = (int)$_GET['id'];

$oFacturaEnc = new FacturaEnc();
$oCliente = new Cliente();

$factura = $oFacturaEnc->getFacturaEncById($idFacturaEnc);
if($factura)
	$cliente = $oCliente->getClienteById($factura['idcliente']);
else {
	die('Error de ingreso, seleccione una factura valida.');
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
          <h1>Adicionando nuevo Detalle en Factura <?php echo $factura['nro_factura']?></h1>
        </div>
        <p class="lead">Nuevo detalle en la factura <?php echo $factura['nro_factura']?> del cliente <?php echo $cliente['nombre_cliente']?>....</p>		
        <p>            
            <a href="index.php" class="btn btn-default btn-lg">Volver a Listado</a>
        </p>
        <br/><br/>

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
			header('Location: ver.php?id='.$idfacturaenc);
			exit;
		} else {
			$mensaje = '<div class="alert alert-danger">Lo sentimos, no se pudo guardar ...</div>';
		}
		
		echo $mensaje;
	
}

?>
			
		
		<form action="nuevo_item.php?id=<?php echo $idFacturaEnc; ?>" class="form-horizontal" method="post" role="form">			
                    <input type='hidden' name='idfacturaenc' value='<?=$idFacturaEnc;?>' />

                    <div class="form-group">
                        <label for="descripcion" class="col-lg-2 control-label">Descripción: </label>
                        <div class="col-lg-10">
                            <input type="text" name="descripcion" id="descripcion" class='form-control' placeholder="Descripción del detalle"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-lg-2 control-label">Monto: </label>
                        <div class="col-lg-10">
                            <input type="text" name="monto" id="monto" class='form-control' placeholder="Monto del detalle"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit"  class='btn btn-primary'>Guardar</button>
                                    <button type="button" class='btn btn-default' onclick="location.href='ver.php?id=<?=$idFacturaEnc;?>';">Cancelar</button>
                        </div>

                    </div>
				
			
		</form>

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