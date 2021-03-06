<?php
require_once 'login.php';
require_once 'include/Usuario.php';
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
		<h2>Listado de Usuarios</h2>
	
		<p>
			<a class="btn btn-primary" href="nuevo.php">Adicionar Nuevo</a>
		</p>
		
		<table class="table table-striped table-bordered table-hover table-condensed">			
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Usuario</th>
					<th></th>
				</tr>
			<thead>
			<tbody>
<?php
$oUsu = new Usuario();
$usuarios = $oUsu->obtenerTodosUsuarios((int)$_SESSION['IdUsu']);
foreach($usuarios as $item){ ?>
				<tr>
					<td><?php echo $item['id'];?></td>
					<td><?php echo $item['nombres'];?></td>
					<td><?php echo $item['usuario'];?></td>
					<td>
						<a class="btn btn-mini" href="edit.php?id=<?php echo $item['id'];?>">Editar</a>
						<a class="btn btn-danger btn-mini" href="delete.php?id=<?php echo $item['id'];?>">Eliminar</a>
					</td>
				</tr>

<?php } ?>			
				
			</tbody>
			<tfoot></tfoot>
		</table>
		
		
	
	
	
	
		<hr>
		<footer>
			<p>© Cimas <?php echo date('Y');?></p>
		</footer>
	
    </div>
	
	

</body>
</html>