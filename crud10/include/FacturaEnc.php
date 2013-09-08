<?php

require_once 'db.php';
/*
 * Clase para conectarse a la Base de datos
 */
class FacturaEnc extends DB
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
	
	public function guardarFactura($nro_factura, $idcliente, $detalle)
	{
		
		$link = $this->getConnection();
		$sql = 'INSERT INTO facturaenc(idcliente, nro_factura, fecha, detalle) ';
		$sql .= 'VALUES(?,?,CURDATE(),?)';
		
		$res = $link->prepare($sql);
		$res->execute(array($idcliente, $nro_factura, $detalle ));
		
		$insertados = $res->rowCount();
		return $insertados;
	
	}
	
	
	
	
	
	
	public function getFacturaEncById($id)
	{
		$link = $this->getConnection();
		
		$res = $link->prepare('SELECT * FROM facturaenc WHERE idfacturaenc = ?');
		$res->execute(array($id));
		$rows = $res->fetchAll();
		if(count($rows) > 0)
			return $rows[0];
		else 
			return false;
	}
	
	public function guardarNuevosDatos($nro_factura, $idcliente, $detalle, $fecha )
	{
	
		$link = $this->getConnection();
		$password = md5($password);
		$res = $link->prepare('INSERT INTO facturaenc(nro_factura, idcliente , fecha, detalle) VALUES(?,?,?,?)');
		$res->execute(array($nro_factura,$idcliente, $fecha, $detalle ));		
		$insertados = $res->rowCount();
		return $insertados;
		
		
	}
	
	public function eliminarFacturaEnc($id)
	{
		$link = $this->getConnection();
		// Eliminamos los detalles:		
		$res = $link->prepare('DELETE FROM facturadet  WHERE idfacturaenc = ?; DELETE FROM facturaenc WHERE idfacturaenc = ?');
		$todobien = $res->execute(array($id,$id ));		 
		return $todobien;
	
	}
	
	public function guardarEdicionDatos($idFacturaEnc ,$nro_factura, $idcliente, $detalle, $fecha )
	{
		$link = $this->getConnection();
		$valores = array($idcliente, $nro_factura, $fecha, $detalle, $idFacturaEnc);
		$sql = 'UPDATE facturaenc SET idcliente = ? , nro_factura = ?, fecha = ?, detalle = ? WHERE idfacturaenc = ?';
		
		$res = $link->prepare($sql);
		$res->execute($valores);		
		$updated = $res->rowCount();
		return $updated;
	}
	
	

}

