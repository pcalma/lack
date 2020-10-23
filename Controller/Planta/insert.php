<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.plantas.php');



if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare("
			INSERT INTO plantas (cod_semilla, fecha_registro, id_especieP, estado,nombre_planta, observacion,tipo ) 
			VALUES (:cod_semilla, :fecha_registro, :id_especieP, :estado, :nombre_planta, :observacion, :tipo)");
		$result = $statement->execute(
			array(
			
				':cod_semilla'	=>	$_POST["cod_semilla"],
				':fecha_registro'	=>	$_POST["fecha_registro"],
				':id_especieP'	=>	$_POST["id_especieP"],
				':nombre_planta'	=>	$_POST["nombre_planta"],
				':observacion'	=>	$_POST["observacion"],
				':estado'	=>	$_POST["estado"],
				':tipo'	=>	$_POST["tipo"]

			)
		);
		if(!empty($result))
		{
			echo 'datos ingresados corectamente';
		}
	}


		if($_POST["operation"] == "Edit")
	{
	

	$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare(
			"UPDATE plantas 
			SET cod_semilla = :cod_semilla, fecha_registro = :fecha_registro, estado  = :estado, id_especieP = :id_especieP, observacion = :observacion, nombre_planta = :nombre_planta, tipo = :tipo 
			WHERE id_planta = :id_planta
			"
		);
		$result = $statement->execute(
			array(
				':cod_semilla'	=>	$_POST["cod_semilla"],
				':fecha_registro'	=>	$_POST["fecha_registro"],
				':id_especieP'	=>	$_POST["id_especieP"],
				':nombre_planta'	=>	$_POST["nombre_planta"],
				':observacion'	=>	$_POST["observacion"],
				':estado'	=>	$_POST["estado"],
				':tipo'	=>	$_POST["tipo"]
			)
		);
		if(!empty($result))
		{
			echo 'datos editados correctamenete';
		}
	}






}

?>