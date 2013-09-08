<?php
session_start();

if(isset($_SESSION['IdUsu']) && !empty($_SESSION['IdUsu'])) {
	
	require_once 'include/Usuario.php';
	$usuario = new Usuario();
	$existe = $usuario->getUsuarioById($_SESSION['IdUsu']);
	if(!$existe) {
		header('Location: index.php');
		exit;
	} 
	
	
} else {
	header('Location: index.php');
	exit;
}
