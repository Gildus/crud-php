<?php
require_once '../login.php';
require_once '../include/Cliente.php';
require_once '../include/FacturaDet.php';
require_once '../include/FacturaEnc.php';

if(!isset($_GET['id'])) {
		header('Location: index.php');
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
          <h1>Listados de detalle de Factura <?php echo $factura['nro_factura']?></h1>
        </div>
        <p class="lead">Ultimos detalles registrados en la factura <?php echo $factura['nro_factura']?> del cliente <?php echo $cliente['nombre_cliente']?>....</p>		
        <p>
            <a href="nuevo_item.php?id=<?php echo $factura['idfacturaenc']?>" class="btn btn-primary btn-lg">Adicionar Nuevo Detalle</a>
            <a href="index.php" class="btn btn-default btn-lg">Volver a Listado</a>
        </p>

        <div class="table-responsive">
        <table class='table table-bordered table-hover table-condensed'>
                <thead>
                        <tr>
                                <th>Id</th>					
                                <th>Descripcion</th>
                                <th>Monto Unitario</th>
                                <th>&nbsp;</th>
                        </tr>
                <thead>
                <tbody>
<?php
$oUsu = new FacturaDet();
$facturas = $oUsu->obtenerFacturasDetalles($idFacturaEnc);
foreach($facturas as $item){ ?>
                        <tr>
                                <td><?php echo $item['idfacturadet'];?></td>					
                                <td><?php echo $item['descripcion'];?></td>
                                <td><?php echo $item['monto'];?></td>
                                <td>					
                                        <a href="edit_item.php?id=<?php echo $item['idfacturadet'];?>">Editar</a>
                                        <a href="delete_item.php?id=<?php echo $item['idfacturadet'];?>">Eliminar</a>
                                </td>
                        </tr>

<?php } ?>			

                </tbody>

        </table>
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