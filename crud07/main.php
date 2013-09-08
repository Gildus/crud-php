<?php
require_once 'login.php';

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
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" >
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	
	
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

      <h1>Mi Proyecto</h1>
      <p>Aqui puede haber un mensaje o descripcion breve de tu sistema, o tambien enlaces o iconos a otras secciones.</p>

		<hr>
		<footer>
			<p>© Cimas <?php echo date('Y');?></p>
		</footer>
	
    </div>

</body>
</html>