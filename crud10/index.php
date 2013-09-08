<?php

session_start();
require_once 'include/Login.php';
/*
* Consultamos si existe la session inicializada al momento de autenticarse
*/
if(isset($_SESSION['nick']) && !empty($_SESSION['nick'])) {

	header('Location: main.php');
	exit;
}


if(isset($_POST['usuario']) && isset($_POST['clave']) && !empty($_POST['usuario']) && !empty($_POST['clave'])) {
	
	$usu = htmlentities($_POST['usuario'], ENT_QUOTES);
	$pass = htmlentities($_POST['clave'], ENT_QUOTES);
	
	$login = new Login();
	$existe = $login->verificarAccesos($usu,$pass);
		
	if($existe) {
		
		$_SESSION['nick'] = $existe[0]['nombres'];
		$_SESSION['IdUsu'] = $existe[0]['id'];
		header('Location: main.php');
		exit;
	
	} else {
		$msgError = '<p class="error">Error de ingreso, vuelva ha interntarlo...</p>';		
	}
	
	
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Cimas - 35068 CI</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

	  <?php if(isset($msgError)) { ?> 
	  <div class="alert alert-danger">
		<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
		<?php echo $msgError;?>
      </div>
	  <?php } ?>
	  
	
      <form class="form-signin" action='index.php' method='post'>
        <h2 class="form-signin-heading">Ingreso al sistema</h2>
        <input type="text" name="usuario" class="form-control" placeholder="Usuario" autofocus>
        <input type="password" name='clave' class="form-control" placeholder="Password">        
        <button class="btn btn-lg btn-primary btn-block" type="submit" data-loading-text="Un momento..." onclick="$(this).button('loading')">Ingresar</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
	<script src="js/jquery-1.10.2.min.js"></script>	
	<script src="js/bootstrap.min.js"></script>
	<script>
	//;
	</script>
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
