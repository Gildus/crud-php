<?php
require_once '../login.php';
require_once '../include/Factura.php';
?>
<!doctype>
<html>
<head>
	<meta charset="utf-8">
	<title>Intranet</title>
	<link href="/css/usuario.css" media="screen" rel="stylesheet" type="text/css">
	<script src="/js/usuario.js" type="text/javascript"></script>
</head>
<body>
	<?php include '../header.php';?>
	
	<section>
		
		<a href="nuevo.php">Adicionar Nueva Factura</a>
		<table class='tabla' border="1">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre Cliente</th>
					<th>Nro. Factura</th>
					<th>Monto Total Factura</th>
					<th>&nbsp;</th>
				</tr>
			<thead>
			<tbody>
<?php
$oUsu = new Factura();
$facturas = $oUsu->obtenerFacturas();
foreach($facturas as $item){ ?>
				<tr>
					<td><?php echo $item['idfacturaenc'];?></td>
					<td><?php echo $item['nombre_cliente'];?></td>
					<td><?php echo $item['nro_factura'];?></td>
					<td><?php echo $item['total_factura'];?></td>
					<td>
						<a href="nuevo_item.php?id=<?php echo $item['idfacturaenc'];?>">Agregar Detalles</a>
						<a href="ver.php?id=<?php echo $item['idfacturaenc'];?>">Ver</a>
						<a href="edit.php?id=<?php echo $item['idfacturaenc'];?>">Editar</a>
						<a href="delete.php?id=<?php echo $item['idfacturaenc'];?>">Eliminar</a>
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