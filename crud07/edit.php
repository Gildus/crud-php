<?php
require_once 'login.php';
require_once 'include/Usuario.php';


if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idUsuario = (int)$_GET['id'];
	
	$objectoUsu = new Usuario();
	$usuario = $objectoUsu->getUsuarioById($idUsuario);
	
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

if( isset($_POST['id']) && !empty($_POST['id']) 
	&& isset($_POST['usu']) && !empty($_POST['usu']) 	
	&& isset($_POST['nom']) && !empty($_POST['nom'])  
	&& isset($_POST['email']) && !empty($_POST['email']) 
	) {
	
		$id = (int)$_POST['id'];
		$usuario = $_POST['usu'];
		
		$password = null;
		if( isset($_POST['pass']) && !empty($_POST['pass']) )		$password = $_POST['pass'];
		
		$nombres = $_POST['nom'];
		$email = $_POST['email'];
		
		$objectoUsuario = new Usuario();
		$todobien = $objectoUsuario->guardarEdicionDatos($id ,$usuario, $password, $nombres, $email );
		if($todobien){
			header('Location: usuario.php');
			exit;
		} else {
			$mensaje = 'Lo sentimos, no se pudo guardar ...';
		}
		
		echo $mensaje;
	
}

?>

		
		
		
		<form class="form-horizontal" action="edit.php?id=<?php echo $idUsuario;?>" method="post">
			<h2>Editando Usuario</h2>
			<input type="hidden" name="id" id="id" value="<?php echo $idUsuario;?>"/>
			
			<div class="control-group">
				<label class="control-label" for="usu">Usuario</label>
				<div class="controls">
					<input type="text" name="usu" id="usu" placeholder="Usuario" value="<?php echo $usuario['usuario'];?>"/>					
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="pass">Password</label>
				<div class="controls">
					<input type="password" name="pass" id="pass" placeholder="Password" value=""/>					
				</div>
			</div>
			
			
			<div class="control-group">
				<label class="control-label" for="nom">Nombres</label>
				<div class="controls">
					<input type="text" name="nom" id="nom" placeholder="Nombres" value="<?php echo $usuario['nombres'];?>"/>					
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="email">E-mail</label>
				<div class="controls">
					<input type="text" name="email" id="email" placeholder="E-mail" value="<?php echo $usuario['correo'];?>"/>					
				</div>
			</div>
			
			
			<div class="control-group">				
				<div class="controls">
					<button type="submit" class="btn">Guardar</button>				
					<button type="button" onclick="location.href='usuario.php';" class="btn">Cancelar</button>				
				</div>
			</div>
			

		</form>
		
		
		
		<hr>
		<footer>
			<p>© Cimas <?php echo date('Y');?></p>
		</footer>
	
    </div>

</body>
</html>