<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.cliente.php');

if(isset($_POST["cod_cliente"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM cliente 
		WHERE cod_cliente = '".$_POST["cod_cliente"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nombre_cliente"] = $row["nombre_cliente"];
		$output["nombre_u"] = $row["nombre_u"];
		$output["estado"] = $row["estado"];
		$output["genero"] = $row["genero"];
		$output["id_rol"] = $row["id_rol"];
		$output["fecha_nacimiento"] = $row["fecha_nacimiento"];
		$output["apellido_cliente"] = $row["apellido_cliente"];
		$output["email"] = $row["email"];
        $output["cedula"] = $row["cedula"];
	}
	echo json_encode($output);
}
?>    
