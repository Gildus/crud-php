<?php
require_once '../login.php';
require_once '../include/Cliente.php';

if(isset($_POST['id']) && !empty($_POST['id']) ) {
	$id = $_POST['id'];
	$objecto_cliente = new Cliente();
	$nro_eliminados = $objecto_cliente->eliminarCliente($id);
	if($nro_eliminados > 0) {
		echo json_encode(array('res'=>'OK'));
	} else {
		echo json_encode(array('res'=>'NOK'));
	}
	
	
}
