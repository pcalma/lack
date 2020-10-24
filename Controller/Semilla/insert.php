<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.semillas.php');



if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare("
			INSERT INTO semillas (nombre_semilla,id_especieS, observacionS, fecha_registroS, cod_proveedor, estado, tipoS) 
			VALUES (:nombre_semilla, :id_especieS, :observacionS, :fecha_registroS, :cod_proveedor, :estado, :tipoS)
		");
		$result = $statement->execute(
			array(
				':nombre_semilla'	=>	$_POST["nombre_semilla"],
				':id_especieS'	=>	$_POST["id_especieS"],
				':observacionS'	=>	$_POST["observacionS"],
				':fecha_registroS'	=>	$_POST["fecha_registroS"],
				':cod_proveedor'	=>	$_POST["cod_proveedor"],
				':estado'	=>	$_POST["estado"],
				':tipoS'	=>	$_POST["tipoS"]
	
			)
		);
		if(!empty($result))
		{
			echo 'datos ingresados correctamente';
		}
	}





		if($_POST["operation"] == "Edit")
	{
	

	$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare(
			"UPDATE semillas 
			SET nombre_semilla = :nombre_semilla, observacionS = :observacionS, fecha_registroS = :fecha_registroS  
			WHERE cod_semilla = :cod_semilla
			"
		);
		$result = $statement->execute(
			array(
				':nombre_semilla'	=>	$_POST["nombre_semilla"],
				':observacionS'	=>	$_POST["observacionS"],
				':fecha_registroS'	=>	$_POST["fecha_registroS"],
				':cod_semilla'	=>	$_POST["cod_semilla"]
			)
		);
		if(!empty($result))
		{
			echo 'datos editados correctamente';
		}
	}


}

?>