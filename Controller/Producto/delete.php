<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.producto.php');


if(isset($_POST["cod_producto"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$statement = $connection->prepare(
		"DELETE FROM productos WHERE cod_producto = :cod_producto"
	);
	$result = $statement->execute(
		array(
			':cod_producto'	=>	$_POST["cod_producto"]
		)
	);
	
	if(!empty($result))
	{
		echo 'se ha eliminado el codigo:  '.$_POST["cod_producto"];
	}
}



?> 