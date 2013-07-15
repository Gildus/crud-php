<?php

class DB
{
	protected $link;
	
	public function __construct()
	{
		try{
			$this->link = new PDO('mysql:dbname=dbejemplo;host=localhost;port=3306','usuario','123');
		} catch(PDOException $e){
			die('Error: '.$e->getMessage());
		}
	
	}
	
	public function getConnection()
	{
		return $this->link;
	}

}
