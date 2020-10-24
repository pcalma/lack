<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.detalle.php');


if(isset($_POST["cod_detalle"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$statement = $connection->prepare(
		"DELETE FROM detalle WHERE cod_detalle = :cod_detalle"
	);
	$result = $statement->execute(
		array(
			':cod_detalle'	=>	$_POST["cod_detalle"]
		)
	);
	
	if(!empty($result))
	{
		echo 'se ha eliminado el codigo:  '.$_POST["cod_detalle"];
	}
}



?> 