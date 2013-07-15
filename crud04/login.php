<?php
session_start();
require_once 'include/Login.php';

if(isset($_SESSION['IdUsu']) && !empty($_SESSION['IdUsu'])) {
	
	$login = new Login();
	$existe = $login->getUsuarioById($_SESSION['IdUsu']);
	if(!$existe) {
		header('Location: index.php');
		exit;
	} 
	
	
} else {
	header('Location: index.php');
	exit;
}
