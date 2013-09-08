<?php
require_once '../login.php';
require_once '../include/Cliente.php';
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
          <h1>Adicionando Nuevo Cliente</h1>
        </div>
        <p class="lead">Todos los datos son obligatorios,....</p>


<?php

if( isset($_POST['nc']) && !empty($_POST['nc']) 
	&& isset($_POST['s']) && !empty($_POST['s']) 	
	) {
	
		$nombre_cliente = $_POST['nc'];
		$status = $_POST['s'];
		
		
		$objectoCliente = new Cliente();
		$todobien = $objectoCliente->guardarNuevosDatos($nombre_cliente, $status);
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = '<div class="alert alert-danger">Lo sentimos, no se pudo guardar ...</div>';
		}
		
		echo $mensaje;
	
}

?>

		
		
		
		<form id="frmNuevo" action="nuevo.php"  class="form-horizontal" method="post" role="form">
			
				<div class="form-group">
					<label for="nc" class="col-lg-2 control-label">Nombre Cliente: </label>					
					<div class="col-lg-10">
						<input type="text" class='form-control' name="nc" id="nc" placeholder="Nombre del Cliente"/>
					</div>
				</div>
				<div class="form-group">
					<label for="s" class="col-lg-2 control-label">Estado Cliente: </label>
					<div class="col-lg-10">
						<select id='s' name='s' class="form-control">
							<option value='E'>Habilitado</option>
							<option value='D'>Deshabilitado</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button id="btnGuardar" type="button" class='btn btn-primary'>Guardar</button>
						<button id="btnGuardar" type="reset" class='btn btn-default' onclick="location.href='index.php';">Cancelar</button>
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