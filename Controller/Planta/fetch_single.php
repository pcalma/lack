<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.plantas.php');
 
if(isset($_POST["id_planta"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM semillas INNER JOIN plantas USING(cod_semilla) INNER JOIN especies USING(id_especieS)
		WHERE id_planta = '".$_POST["id_planta"]."' 
		LIMIT 1"
	);





	$statement->execute();
	


	$result = $statement->fetchAll();
	foreach($result as $row)
	{

  
		$output["nombre_planta"] = $row["nombre_planta"];
		$output["nombre_semilla"] = $row["nombre_semilla"];
		$output["fecha_registro"] = $row["fecha_registro"];
		$output["nombreS"] = $row["nombreS"];
		$output["observacion"] = $row["observacion"];
		$output["estado"] = $row["estado"];
		$output["tipo"] = $row["tipo"];


	}
	echo json_encode($output);
}
?>    