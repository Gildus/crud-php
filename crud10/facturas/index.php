<?php
require_once '../login.php';
require_once '../include/Factura.php';
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
          <h1>Listado de Facturas</h1>
        </div>
        <p class="lead">Ultimas facturas registradas en el sistema,....</p>
		<p>
			<a href="nuevo.php" class="btn btn-primary btn-lg">Adicionar Nueva Factura</a>
		</p>
		<div class="table-responsive">
		<table class='table table-bordered table-hover table-condensed'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre Cliente</th>
					<th>Nro. Factura</th>
					<th>Monto Total Factura</th>
					<th>&nbsp;</th>
				</tr>
			<thead>
			<tbody>
<?php
$oUsu = new Factura();
$facturas = $oUsu->obtenerFacturas();
foreach($facturas as $item){ ?>
				<tr>
					<td><?php echo $item['idfacturaenc'];?></td>
					<td><?php echo $item['nombre_cliente'];?></td>
					<td><?php echo $item['nro_factura'];?></td>
					<td><?php echo $item['total_factura'];?></td>
					<td>
						<a class="btn btn-default btn-xs" href="nuevo_item.php?id=<?php echo $item['idfacturaenc'];?>">Agregar Detalles</a>
						<a class="btn btn-default btn-xs" href="ver.php?id=<?php echo $item['idfacturaenc'];?>">Ver</a>
						<a class="btn btn-default btn-xs" href="edit.php?id=<?php echo $item['idfacturaenc'];?>">Editar</a>
						<a class="btn btn-danger btn-xs" href="delete.php?id=<?php echo $item['idfacturaenc'];?>">Eliminar</a>
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
	
  </body>
</html>
