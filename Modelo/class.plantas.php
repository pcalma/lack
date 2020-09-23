<?php 


class CPlantas{
	
	function get_total_all_records()
	{
	
$modelo = new Conexion();
$connection = $modelo->conectarbd();
$statemente = $connection->prepare("SELECT * FROM plantas");
$statemente->execute();
$result  = $statemente->fetchAll();
return $statemente->rowCount();


	}
}

 ?>