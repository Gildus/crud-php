<?php
require_once '../login.php';
require_once '../include/Cliente.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$idCliente = (int)$_GET['id'];
	$objecto_cliente = new Cliente();
	$datos_del_cliente = $objecto_cliente->getClienteById($idCliente);
	
	//echo json_encode(array('res'=>$datos_del_cliente));
	var_dump($datos_del_cliente);
}
exit;

