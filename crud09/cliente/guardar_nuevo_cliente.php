<?php
require_once '../login.php';
require_once '../include/Cliente.php';

if(isset($_POST['nombres']) && !empty($_POST['nombres']) && isset($_POST['estado']) && !empty($_POST['estado'])) {
	$nombres = $_POST['nombres'];
	$estado = $_POST['estado'];
	$objecto_cliente = new Cliente();
	$nro_insertados = $objecto_cliente->guardarNuevosDatos($nombres, $estado);
	if($nro_insertados > 0) {
		echo json_encode(array('res'=>'OK'));
	} else {
		echo json_encode(array('res'=>'NOK'));
	}
	
	
}
