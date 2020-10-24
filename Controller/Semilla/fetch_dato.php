<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.semillas.php');
 
if(isset($_POST["cod_semilla"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM semillas JOIN especies
USING (id_especieS) JOIN proveedor USING (cod_proveedor)
		WHERE cod_semilla = '".$_POST["cod_semilla"]."' 
		LIMIT 1"
	);

	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{


		
		$output["nombre_semilla"] = $row["nombre_semilla"];
		$output["nombreS"] = $row["nombreS"];
		$output["fecha_registroS"] = $row["fecha_registroS"];
		$output["observacionS"] = $row["observacionS"];
		$output["nomP"] = $row["nomP"];
		$output["estado"] = $row["estado"];
		$output["tipoS"] = $row["tipoS"];
	}
	echo json_encode($output);
}
?>    