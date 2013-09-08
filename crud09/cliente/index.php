<?php
require_once '../login.php';
require_once '../include/Cliente.php';
?>
<!doctype>
<html>
<head>
	<meta charset="utf-8">
	<title>Intranet</title>
	<link href="../css/usuario.css" media="screen" rel="stylesheet" type="text/css">
	<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>	
	<script src="../js/usuario.js" type="text/javascript"></script>
</head>
<body>
	<?php include '../header.php';?>
	
	<section>
		
		<a href="nuevo.php">Adicionar Nuevo</a>
		<a href="javascript:void(0);" id='adicionar_con_ajax'>Adicionar Nuevo con Ajax</a>
		<div id='nuevo_cliente'>
			<form id="frmNuevo" method="post">
				<table class='tabla' border="0">
					<tr>
						<td>Nombre Cliente: </td>
						<td><input type="text" name="nombre_cliente" id="nombre_cliente"/></td>
					</tr>
					<tr>
						<td>Estado: </td>
						<td>
							<select id='estado' name='estado'>
								<option value='E'>Habilitado</option>
								<option value='D'>Deshabilitado</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<button id="btnGuardarNuevo" type="button">Guardar</button>
							<button id="btnGuardarCancelar" type="button">Cancelar</button>
						</td>
						
					</tr>
					
				</table>
			</form>
		</div>
		<div id="datos_cliente">
			<table border="0" class="tabla">
				<tr>
					<td>Nombre Cliente: </td>
						<td>
							<input type="text" value="" id="nombre_cliente" name="nombre_cliente">
							<input type="hidden" value="" id="idcliente" name="idcliente">
						</td>
				</tr>
				<tr>
					<td colspan="2">
						<button id="guardar_edicion" type="button">Guardar</button> 
						<button onclick="edicion_cliente(false);" type="button">Cancelar</button>
					</td>
				</tr>				
			</table>			
		</div>
		
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
$obj = new Cliente();
$clientes = $obj->obtenerTodosClientes();
foreach($clientes as $item){ ?>
				<tr>
					<td><?php echo $item['idcliente'];?></td>
					<td><?php echo $item['nombre_cliente'];?></td>
					<td><?php echo $item['status'];?></td>
					<td>
						<a class="btnEditar" href="edit.php?id=<?php echo $item['idcliente'];?>">Editar sin Ajax</a>
						<a class="btnEditarConAjax" href="javascript:void(0);" data-idcliente="<?php echo $item['idcliente'];?>">Editar con Ajax</a>
						<a class="btnBorrar" href="delete.php?id=<?php echo $item['idcliente'];?>">Eliminar</a>
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