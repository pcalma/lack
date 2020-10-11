<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.plantas.php');


if(isset($_POST["id_planta"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$statement = $connection->prepare(
		"DELETE FROM plantas WHERE id_planta = :id_planta"
	);
	$result = $statement->execute(
		array(
			':id_planta'	=>	$_POST["id_planta"]
		)
	);
	
	if(!empty($result))
	{
		echo 'se ha eliminado el codigo:  '.$_POST["id_planta"];
	}
}



?> 