<?php
require_once 'login.php';
require_once 'include/Usuario.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idUsuario = (int)$_GET['id'];
}
else {
	header("Location: usuario.php");
	exit;
}


?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Intranet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
	
	
	<link href="css/bootstrap.min.css" rel="stylesheet" >		
	<link href="css/usuario.css" media="screen" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" >	
	
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/usuario.js" type="text/javascript"></script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="main.php">Mi proyecto</a>
          <div class="nav-collapse collapse">
		  
			<ul class="nav">
              <li class="active"><a href="usuario.php">Usuarios</a></li>
              <li><a href="#otros1">Otros 1</a></li>
              <li><a href="#otros2">Otros 2</a></li>
            </ul>
			
			<p class="navbar-text pull-right">
              Bienvenido <?php echo $_SESSION['nick'];?>,&nbsp; <a class="btn btn-mini" href="salir.php" style="margin-top:0px;">Cerrar Sesión</a>
            </p>
			
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

	<div class="container">

<?php

if( isset($_POST['id']) && !empty($_POST['id']) ) {
	
		$idUsuario = $_POST['id'];
				
		$objectoUsuario = new Usuario();
		$todobien = $objectoUsuario->eliminarUsuario($idUsuario );
		if($todobien){
			header('Location: usuario.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo eliminar ...';
		}
		
		echo $mensaje;
	
}


$oUsuario = new Usuario();
$usuario = $oUsuario->getUsuarioById($idUsuario);


?>

		
		
		<h1>Eliminando Usuario</h1>
		<form action="delete.php?id=<?php echo $idUsuario;?>" method="post">
			<input type="hidden" name="id" value="<?php echo $idUsuario;?>" />			
			Desea realmente eliminar el usuario: <?php echo $usuario['nombres'];?> 
			<button class="btn btn-small btn-danger " type="submit">SI</button> &nbsp;
			<button class="btn btn-small btn-inverse" type="button" onclick="location.href='usuario.php';">NO</button>
			?
		</form>
		
		
		
		<hr>
		<footer>
			<p>© Cimas <?php echo date('Y');?></p>
		</footer>
	
    </div>
	

</body>
</html>