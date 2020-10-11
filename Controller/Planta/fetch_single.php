<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.plantas.php');
 
if(isset($_POST["id_planta"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM semillas INNER JOIN plantas USING(cod_semilla) INNER JOIN especiep USING(id_especieP)
		WHERE id_planta = '".$_POST["id_planta"]."' 
		LIMIT 1"
	);





	$statement->execute();
	


	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		$output["id_planta"] = $row["id_planta"];
		$output["nombre_semilla"] = $row["nombre_semilla"];
		$output["cod_semilla"] = $row["cod_semilla"];
		$output["fecha_registro"] = $row["fecha_registro"];
		$output["nombreP"] = $row["nombreP"];
		$output["estado"] = $row["estado"];
		$output["nombre_planta"] = $row["nombre_planta"];
		$output["observacion"] = $row["observacion"];


	}
	echo json_encode($output);
}
?>    