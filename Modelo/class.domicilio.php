<?php 

/**
 * 
 */
class CDomicilio
{
	
	function get_total_all_records()
	{

		$modelo = new Conexion();
		$con = $modelo->conectarbd();
		$statement = $con->prepare("SELECT * FROM domicilio");
		$statement->execute();
		$result = $statement->fetchAll();
		return $statement->rowCount();




	}
}


 ?>