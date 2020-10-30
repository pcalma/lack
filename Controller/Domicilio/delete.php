<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.domicilio.php');


if(isset($_POST["cod_domicilio"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$statement = $connection->prepare(
		"DELETE FROM domicilio WHERE cod_domicilio = :cod_domicilio"
	);
	$result = $statement->execute(
		array(
			':cod_domicilio'	=>	$_POST["cod_domicilio"]
		)
	);
	
	if(!empty($result))
	{
		echo 'se ha eliminado el codigo:  '.$_POST["cod_domicilio"];
	}
}



?> 