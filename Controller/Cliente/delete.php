<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.cliente.php');


if(isset($_POST["cod_cliente"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$statement = $connection->prepare(
		"DELETE FROM cliente WHERE cod_cliente = :cod_cliente"
	);
	$result = $statement->execute(
		array(
			':cod_cliente'	=>	$_POST["cod_cliente"]
		)
	);
	
	if(!empty($result))
	{
		echo 'se ha eliminado el codigo:  '.$_POST["cod_cliente"];
	}
}



?> 