<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.proveedor.php');
 
if(isset($_POST["cod_proveedor"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM proveedor
		WHERE cod_proveedor = '".$_POST["cod_proveedor"]."' 
		LIMIT 1"
	);

	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{


		
		
		$output["nomP"] = $row["nomP"];
		$output["tel_proveedor"] = $row["tel_proveedor"];
		$output["direccion"] = $row["direccion"];
	}
	echo json_encode($output);
}
?>    