<?php 


/**
 * 
 */
class CProductos 
{

	function get_total_all_records()
{

	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$statement = $connection->prepare("SELECT * FROM productos");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
	
	
}



 ?>