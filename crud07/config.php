<?php

function existeUsuario($u, $p)
{
	$usuarios = array(
		array(
			'usuario'=>'Maria',
			'password'=>'123'
		),
		array(
			'usuario'=>'Luis',
			'password'=>'1234'
		),
		array(
			'usuario'=>'Roxana',
			'password'=>'12345'
		)
	);

	if(!empty($u) && !empty($p)) {
	
		foreach($usuarios as $usuario) {			
			if($usuario['usuario']==$u && $usuario['password']==$p) {
				return true;
			} else {
				return false;
			}
			
		}
		
	}
	
}