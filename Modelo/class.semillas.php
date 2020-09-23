

<?php 

/**
 * 
 */
class CSemillas
{
	
	function get_total_all_records() 
	{
		$modelo = new Conexion();
		$connection = $modelo->conectarbd();
		$statement = $connection->prepare("SELECT * FROM semillas");
		$statement->execute();
		$result  = $statement->fetchAll();
	return $statement->rowCount();
	}
}

 ?>