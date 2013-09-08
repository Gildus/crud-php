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
          <h1>Listado de Usuarios</h1>
        </div>
        <p class="lead">Usuarios registrados en el sistema,....</p>
		<p>
			<a href="nuevo.php" class="btn btn-primary btn-lg">Adicionar Nuevo</a>
		</p>
		<div class="table-responsive">
		<table class='table table-bordered table-hover table-condensed'>
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
$usuarios = $oUsu->obtenerTodosUsuarios();
foreach($usuarios as $item){ ?>
				<tr>
					<td><?php echo $item['id'];?></td>
					<td><?php echo $item['nombres'];?></td>
					<td><?php echo $item['usuario'];?></td>
					<td>
						<a class="btn btn-default btn-xs" href="edit.php?id=<?php echo $item['id'];?>">Editar</a>
						<a class="btn btn-danger btn-xs" href="delete.php?id=<?php echo $item['id'];?>">Eliminar</a>
					</td>
				</tr>

<?php } ?>			
				
			</tbody>		
		</table>
		</div>
		
		<p></p>
        
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