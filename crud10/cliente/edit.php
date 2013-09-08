<?php
require_once '../login.php';
require_once '../include/Cliente.php';


if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idCliente = (int)$_GET['id'];
	
	$objectoCliente = new Cliente();
	$cliente = $objectoCliente->getClienteById($idCliente);
	
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
	<link href="../css/cliente.css" rel="stylesheet">

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
          <h1>Editando Cliente</h1>
        </div>
        <p class="lead">Todos los datos son obligatorios,....</p>

		
		


<?php

if( isset($_POST['id']) && !empty($_POST['id']) 
	&& isset($_POST['nombre_cliente']) && !empty($_POST['nombre_cliente']) 		
	) {
	
		$id = (int)$_POST['id'];
		$nombre_cliente = $_POST['nombre_cliente'];
				
		$todobien = $objectoCliente->guardarEdicionDatos($id ,$nombre_cliente);
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = '<div class="alert alert-danger">Lo sentimos, no se pudo guardar ...</div>';
		}
		
		echo $mensaje;
	
}

?>

						
		<form action="edit.php?id=<?php echo $idCliente;?>" class="form-horizontal" method="post" role="form">
			<input type="hidden" name="id" id="id" value="<?php echo $idCliente;?>"/>
			
				<div class="form-group">
					<label for="nombre_cliente" class="col-lg-2 control-label">Nombre Cliente: </label>
					<div class="col-lg-10">
						<input type="text" class='form-control' name="nombre_cliente" id="nombre_cliente" placeholder="Nombre del Cliente" value="<?php echo $cliente['nombre_cliente'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit" class='btn btn-primary'>Guardar</button> 
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
	<script src="../js/cliente.js" type="text/javascript"></script>
  </body>
</html>