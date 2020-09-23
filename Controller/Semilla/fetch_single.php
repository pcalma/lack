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

		$output["nombre"] = $row["nombre"];
		$output["observacion"] = $row["observacion"];
		$output["fecha_registro"] = $row["fecha_registro"];
		$output["nombre_proveedor"] = $row["nombre_proveedor"];
		$output["estado"] = $row["estado"];
		
	
	}
	echo json_encode($output);
}
?>    