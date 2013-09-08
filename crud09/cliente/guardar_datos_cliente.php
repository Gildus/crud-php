<?php
require_once '../login.php';
require_once '../include/Cliente.php';

if(isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['nombre']) && !empty($_POST['nombre'])) {
	$idCliente = (int)$_POST['id'];
	$nombreCliente = $_POST['nombre'];
	$objecto_cliente = new Cliente();
	$editado = $objecto_cliente->guardarEdicionDatos($idCliente,$nombreCliente);
	
	echo json_encode(array('res'=>$editado));
	
}
