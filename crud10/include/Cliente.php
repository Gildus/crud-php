<?php

require_once 'db.php';
/*
 * Clase para conectarse a la Base de datos
 */
class Cliente extends DB
{
	
	public function obtenerTodosClientes()
	{
		$link = $this->getConnection();
		
		$res = $link->prepare('SELECT * FROM cliente');
		$res->execute();
		$rows = $res->fetchAll();
		return $rows;
				
	}
	
	public function getClienteById($id)
	{
		$link = $this->getConnection();
		
		$res = $link->prepare('SELECT * FROM cliente WHERE idcliente = ?');
		$res->execute(array($id));
		$rows = $res->fetchAll();
		if(count($rows) > 0)
			return $rows[0];
		else 
			return false;
	}
	
	public function guardarNuevosDatos($nombre_cliente, $status)
	{
	
		$link = $this->getConnection();
		$res = $link->prepare('INSERT INTO cliente(nombre_cliente, status) VALUES(?,?)');
		$res->execute(array($nombre_cliente, $status));		
		$insertados = $res->rowCount();
		return $insertados;
		
		
	}
	
	public function eliminarCliente($id)
	{
		$link = $this->getConnection();
		$res = $link->prepare('DELETE FROM cliente WHERE idcliente = ?');
		$res->execute(array($id));
		$borrados = $res->rowCount();
		return $borrados;
	
	}
	
	public function guardarEdicionDatos($id, $nombre_cliente, $estado_cliente)
	{
		$link = $this->getConnection();
		$valores = array($nombre_cliente, $estado_cliente, $id);
		$sql = 'UPDATE cliente SET nombre_cliente = ?, status = ? WHERE idcliente = ?';
		
		$res = $link->prepare($sql);
		$res->execute($valores);		
		$updated = $res->rowCount();
		return $updated;
	}
	
	

}

