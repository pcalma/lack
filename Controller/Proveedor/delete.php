<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.proveedor.php');


if(isset($_POST["cod_proveedor"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$statement = $connection->prepare(
		"DELETE FROM proveedor WHERE cod_proveedor = :cod_proveedor"
	);
	$result = $statement->execute(
		array(
			':cod_proveedor'	=>	$_POST["cod_proveedor"]
		)
	);
	
	if(!empty($result))
	{
		echo 'se ha eliminado el codigo:  '.$_POST["cod_proveedor"];
	}
}



?> 