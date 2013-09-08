<?php

require_once 'db.php';
/*
 * Clase para conectarse a la Base de datos
 */
class FacturaDet extends DB
{
	
	public function obtenerFacturasDetalles($idFacturaEnc)
	{
		$link = $this->getConnection();
		$sql = 'SELECT facturadet.idfacturadet, facturadet.monto, facturadet.descripcion';
		$sql .= '   FROM facturadet ';
		$sql .= ' WHERE facturadet.idfacturaenc = ? ';		
		
		$res = $link->prepare($sql);
		$res->execute(array($idFacturaEnc));
		$rows = $res->fetchAll();
		return $rows;
				
	}
	
	
	
	
	
	
	public function getDetalleFacturaById($id)
	{
		$link = $this->getConnection();
		
		$res = $link->prepare('SELECT * FROM facturadet WHERE idfacturadet = ?');
		$res->execute(array($id));
		$rows = $res->fetchAll();
		if(count($rows) > 0)
			return $rows[0];
		else 
			return false;
	}
	
	public function guardarFacturaDetalle($idfacturaenc, $descripcion, $monto)
	{
	
		$link = $this->getConnection();
		$password = md5($password);
		$res = $link->prepare('INSERT INTO facturadet(idfacturaenc, descripcion, monto) VALUES(?,?,?)');
		$res->execute(array($idfacturaenc,$descripcion, $monto ));		
		$insertados = $res->rowCount();
		//var_dump($insertados); exit;
		return $insertados;
		
		
	}
	
	public function eliminarDetalle($id)
	{
		$link = $this->getConnection();
		$res = $link->prepare('DELETE FROM facturadet WHERE idfacturadet = ?');
		$res->execute(array($id ));		
		$borrados = $res->rowCount();
		return $borrados;
	
	}
	
	public function guardarEdicionDetalle($idfacturadet, $descripcion, $monto)
	{
		$link = $this->getConnection();
		$valores = array($descripcion, $monto, $idfacturadet);
		$sql = 'UPDATE facturadet SET descripcion = ? , monto= ?  WHERE idfacturadet = ?';
		
		$res = $link->prepare($sql);
		$res->execute($valores);		
		$updated = $res->rowCount();
		return $updated;
	}
	
	

}

