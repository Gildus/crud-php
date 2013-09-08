<?php

require_once 'db.php';
/*
 * Clase para conectarse a la Base de datos
 */
class Factura extends DB
{
	
	public function obtenerFacturas()
	{
		$link = $this->getConnection();
		$sql = 'SELECT facturaenc.idfacturaenc, cliente.nombre_cliente, facturaenc.nro_factura,';
		$sql .= ' SUM(facturadet.monto) as total_factura  ';
		$sql .= ' FROM facturaenc ';
		$sql .= ' LEFT JOIN cliente ON facturaenc.idcliente =  cliente.idcliente ';
		$sql .= ' LEFT JOIN facturadet ON facturaenc.idfacturaenc = facturadet.idfacturaenc ';
		$sql .= ' GROUP BY facturaenc.idfacturaenc';
		
		$res = $link->prepare($sql);		
		$res->execute();
		$rows = $res->fetchAll();
		return $rows;
				
	}
	
	public function getUsuarioById($id)
	{
		$link = $this->getConnection();
		
		$res = $link->prepare('SELECT * FROM usuario WHERE id = ?');
		$res->execute(array($id));
		$rows = $res->fetchAll();
		if(count($rows) > 0)
			return $rows[0];
		else 
			return false;
	}
	
	public function guardarNuevosDatos($usuario, $password, $nombres, $email)
	{
	
		$link = $this->getConnection();
		$password = md5($password);
		$res = $link->prepare('INSERT INTO usuario(usuario, password, nombres, correo) VALUES(?,?,?,?)');
		$res->execute(array($usuario,$password, $nombres, $email ));		
		$insertados = $res->rowCount();
		return $insertados;
		
		
	}
	
	public function eliminarUsuario($id)
	{
		$link = $this->getConnection();
		$res = $link->prepare('DELETE FROM usuario WHERE id = ?');
		$res->execute(array($id ));		
		$borrados = $res->rowCount();
		return $borrados;
	
	}
	
	public function guardarEdicionDatos($id, $usuario, $password, $nombres, $email)
	{
		$link = $this->getConnection();
		$valores = array($usuario, $nombres, $email, $id);
		$sql = 'UPDATE usuario SET usuario = ? ';
		if($password) { 
			$valores = array($usuario, md5($password), $nombres, $email, $id);
			$sql .= ', password = ?';
		}
		$sql .= ', nombres = ?, correo = ? WHERE id = ?';
		
		$res = $link->prepare($sql);
		$res->execute($valores);		
		$updated = $res->rowCount();
		return $updated;
	}
	
	

}

