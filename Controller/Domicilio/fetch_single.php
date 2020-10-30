<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.domicilio.php');
 
if(isset($_POST["cod_domicilio"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM domicilio
		WHERE cod_domicilio = '".$_POST["cod_domicilio"]."' 
		LIMIT 1"
	);





	$statement->execute();
	


	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		$output["cod_cliente"] = $row["cod_cliente"];
		$output["cod_empleado"] = $row["cod_empleado"];
		$output["direccion"] = $row["direccion"];
		$output["estado"] = $row["estado"];
		$output["fecha"] = $row["fecha"];
		$output["fechaEnrega"] = $row["fechaEnrega"];
		$output["hora"] = $row["hora"];
		$output["tel_cliente"] = $row["tel_cliente"];

		
	
	}
	echo json_encode($output);
}
?>    