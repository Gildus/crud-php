<?php
require_once '../login.php';
require_once '../include/Cliente.php';

if(isset($_POST['id']) && !empty($_POST['id']) 
        && isset($_POST['nombre_cliente']) && !empty($_POST['nombre_cliente']) 
        && isset($_POST['estado']) && !empty($_POST['estado']) ) {
	$idCliente = (int)$_POST['id'];
	$nombreCliente = $_POST['nombre_cliente'];
        $estadoCliente = $_POST['estado'];
	$objecto_cliente = new Cliente();
	$editado = $objecto_cliente->guardarEdicionDatos($idCliente,$nombreCliente, $estadoCliente);
	if($editado)
            echo json_encode(array('res'=>'OK'));
        else 
            echo json_encode(array('res'=>'NOK'));
	
}
