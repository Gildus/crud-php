<?php
require_once '../login.php';
require_once '../include/FacturaDet.php';

if(!isset($_GET['id'])) {
		header('Location: index.php');
}

$idFacturaEnc = (int)$_GET['id'];
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
		
		<h1>Listado de Facturas</h1>
		
		<a href="index.php">Volver a Listado</a>
		<table class='tabla' border="1">
			<thead>
				<tr>
					<th>Id</th>					
					<th>Descripcion</th>
					<th>Monto Unitario</th>
					<th>&nbsp;</th>
				</tr>
			<thead>
			<tbody>
<?php
$oUsu = new FacturaDet();
$facturas = $oUsu->obtenerFacturasDetalles($idFacturaEnc);
foreach($facturas as $item){ ?>
				<tr>
					<td><?php echo $item['idfacturadet'];?></td>					
					<td><?php echo $item['descripcion'];?></td>
					<td><?php echo $item['monto'];?></td>
					<td>					
						<a href="edit_item.php?id=<?php echo $item['idfacturadet'];?>">Editar</a>
						<a href="delete_item.php?id=<?php echo $item['idfacturadet'];?>">Eliminar</a>
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