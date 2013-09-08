<?php
require_once '../login.php';
require_once '../include/FacturaEnc.php';
require_once '../include/Cliente.php';


if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idFacturaEnc = (int)$_GET['id'];	
	
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
	
	<link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="../css/facturas.css" rel="stylesheet">

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
          <h1>Editando Factura</h1>
        </div>
        <p class="lead">Todos los datos son obligatorios,....</p>

		
		

<?php

if( isset($_POST['id']) && !empty($_POST['id']) 
	&& isset($_POST['nro_factura']) && !empty($_POST['nro_factura']) 	
	&& isset($_POST['idcliente']) && !empty($_POST['idcliente'])  
	&& isset($_POST['detalle']) && !empty($_POST['detalle']) 
	&& isset($_POST['fecha']) && !empty($_POST['fecha']) 
	) {
	
		$idFacturaEnc = (int)$_POST['id'];
		$nro_factura = $_POST['nro_factura'];		
		$idcliente = (int)$_POST['idcliente'];
		$detalle = $_POST['detalle'];
		$fecha = $_POST['fecha'];
		
		$objectoFacturaEnc = new FacturaEnc();
		$todobien = $objectoFacturaEnc->guardarEdicionDatos($idFacturaEnc ,$nro_factura, $idcliente, $detalle, $fecha );
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = '<div class="alert alert-danger">Lo sentimos, no se pudo guardar ...</div>';
		}
		
		echo $mensaje;
	
}


$oFacturaEnc = new FacturaEnc();
$oCliente = new Cliente();

$factura = $oFacturaEnc->getFacturaEncById($idFacturaEnc);
if($factura)
	$lstCliente = $oCliente->obtenerTodosClientes();
else {
	die('Error de ingreso, seleccione una factura valida.');
}

?>

		
				
		<form action="edit.php?id=<?php echo $idFacturaEnc;?>"  class="form-horizontal" method="post" role="form">
			<input type="hidden" name="id" id="id" value="<?php echo $idFacturaEnc;?>"/>
			<div class="form-group">
				<label for="fecha" class="col-lg-2 control-label">Fecha: </label>
				<div id="datetimepicker" class="input-group date col-lg-10">
					<input type="text" name="fecha" id="fecha" value="<?php echo $factura['fecha']?>"  readonly class="form-control" data-format="yyyy-mm-dd"/>
					<span class="add-on input-group-addon">
					  <i class='glyphicon glyphicon-calendar'>
					  </i>
					</span>
				</div>			
				
			</div>
			<div class="form-group">
				<label for="nro_factura" class="col-lg-2 control-label">Nro. Factura: </label>
				<div class="col-lg-10">
					<input type="text" class='form-control' placeholder="Nro. de Factura" name="nro_factura" id="nro_factura" value="<?php echo $factura['nro_factura']?>"/>
				</div>
			</div>
			<div class="form-group">				
				<label for="idcliente" class="col-lg-2 control-label">Cliente: </label>
				<div class="col-lg-10">
					<select name='idcliente' id="idcliente"  class='form-control'>
					<?php foreach($lstCliente as $cliente) {?>
						<option value='<?=$cliente['idcliente'];?>' <?php if($factura['idcliente']==$cliente['idcliente']) echo 'selected';?>>
							<?=$cliente['nombre_cliente'];?>
						</option>
					<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="detalle" class="col-lg-2 control-label">Observaciones: </label>					
				<div class="col-lg-10">
					<textarea name="detalle" class='form-control'  placeholder="Observaciones"><?php echo $factura['detalle']?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
					<button type="submit"  class='btn btn-primary'>Guardar</button>
					<button type="button" class='btn btn-default' onclick="location.href='index.php';">Cancelar</button>
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
	<script src="../js/bootstrap-datetimepicker.min.js"></script>	
	<script src="../js/facturas.js" type="text/javascript"></script>
  </body>
</html>