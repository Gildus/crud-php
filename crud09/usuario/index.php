<?php
require_once '../login.php';
require_once '../include/Usuario.php';
?>
<!doctype>
<html>
<head>
	<meta charset="utf-8">
	<title>Intranet</title>
	<link href="../css/usuario.css" media="screen" rel="stylesheet" type="text/css">
	<script src="../js/usuario.js" type="text/javascript"></script>
</head>
<body>
	<?php include '../header.php';?>
	
	<section>
		
		<a href="nuevo.php">Adicionar Nuevo</a>
		<table class='tabla' border="0">
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
						<a href="edit.php?id=<?php echo $item['id'];?>">Editar</a>
						<a href="delete.php?id=<?php echo $item['id'];?>">Eliminar</a>
					</td>
				</tr>

<?php } ?>			
				
			</tbody>
			<tfoot></tfoot>
		</table>
		
		
		
	</section>
	
	<?php include '../footer.php';?>
	

</body>
</html>