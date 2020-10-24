<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.detalle.php');
 
if(isset($_POST["cod_detalle"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM detalle INNER JOIN categoria USING(id_categoria)
		WHERE cod_detalle = '".$_POST["cod_detalle"]."' 
		LIMIT 1"
	);





	$statement->execute();
	


	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		$output["descripcionD"] = $row["descripcionD"];
		$output["id_categoria"] = $row["id_categoria"];
		$output["img_deta"] = $row["img_deta"];
		$output["nombreD"] = $row["nombreD"];
		$output["precioD"] = $row["precioD"];
		$output["descripcion"] = $row["descripcion"];

	}
	echo json_encode($output);
}
?>    