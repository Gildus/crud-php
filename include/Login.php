<?php

require_once 'db.php';
/*
 * Clase para conectarse a la Base de datos
 */
class Login extends DB
{
	
	public function verificarAccesos($usu, $pass)
	{
		
		if(!empty($usu) && !empty($pass)) {
			$link = $this->getConnection();
			$pass = md5($pass);
			$res = $link->prepare('SELECT * FROM usuario WHERE usuario = ? AND password = ?');
			$res->execute(array($usu,$pass));
			$rows = $res->fetchAll();			
			if(count($rows)>0)	return $rows;
			else return false;
			
		} else {
		
			return false;
			
		}
		
	}
	
	
	
	
	
	
	

}

