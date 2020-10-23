<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.producto.php');

if(isset($_POST["cod_producto"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM productos JOIN proveedor USING(cod_proveedor)
		WHERE cod_producto = '".$_POST["cod_producto"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["cod_producto"] = $row["cod_producto"];
		$output["nombre_proveedor"] = $row["nombre_proveedor"];
		$output["descripcion"] = $row["descripcion"];
		$output["nombre_producto"] = $row["nombre_producto"];
		$output["precio"] = $row["precio"];
		$output["cantidad"] = $row["cantidad"];


	}
	echo json_encode($output);
}
?> 