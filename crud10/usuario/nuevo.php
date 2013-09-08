<?php
require_once '../login.php';
require_once '../include/Usuario.php';
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
	<link href="../css/usuario.css" rel="stylesheet">

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
          <h1>Adicionando Nuevo Usuario</h1>
        </div>
        <p class="lead">Todos los datos son obligatorios,....</p>


<?php

if( isset($_POST['usu']) && !empty($_POST['usu']) 
	&& isset($_POST['pass']) && !empty($_POST['pass']) 
	&& isset($_POST['nom']) && !empty($_POST['nom'])  
	&& isset($_POST['email']) && !empty($_POST['email']) 
	) {
	
		$usuario = $_POST['usu'];
		$password = $_POST['pass'];
		$nombres = $_POST['nom'];
		$email = $_POST['email'];
		
		$objectoUsuario = new Usuario();
		$todobien = $objectoUsuario->guardarNuevosDatos($usuario, $password, $nombres, $email );
		if($todobien){
			header('Location: index.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo guardar ...';
		}
		
		echo $mensaje;
	
}

?>

		
		
		
		<form action="nuevo.php"  class="form-horizontal" method="post" role="form">
			
			<div class="form-group">					
					<label for="usu" class="col-lg-2 control-label">Usuario: </label>
					<div class="col-lg-10">
						<input type="text"  class='form-control' placeholder="Nombre del usuario" name="usu" id="usu" value=""/>
					</div>
				</div>
				<div class="form-group">					
					<label for="pass" class="col-lg-2 control-label">Password: </label>
					<div class="col-lg-10">
						<input type="password" class='form-control' name="pass" id="pass" value=""  placeholder="Ingrese el Password"/>
					</div>
				</div>
				<div class="form-group">					
					<label for="nom" class="col-lg-2 control-label">Nombres: </label>
					<div class="col-lg-10">
						<input type="text" class='form-control' name="nom" id="nom" value="" placeholder="Ingrese los Nombres Completos"/>
					</div>
				</div>
				<div class="form-group">					
					<label for="email" class="col-lg-2 control-label">E-mail: </label>
					<div class="col-lg-10">
						<input type="text" class='form-control' name="email" id="email" value="" placeholder="Ingrese el Correo Electrónico"/>
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
	
  </body>
</html>