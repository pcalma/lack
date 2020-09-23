<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.semillas.php');


if(isset($_POST["cod_semilla"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$statement = $connection->prepare(
		"DELETE FROM semillas WHERE cod_semilla = :cod_semilla"
	);
	$result = $statement->execute(
		array(
			':cod_semilla'	=>	$_POST["cod_semilla"]
		)
	);
	
	if(!empty($result))
	{
		echo 'se ha eliminado el codigo:  '.$_POST["cod_semilla"];
	}
}



?> 