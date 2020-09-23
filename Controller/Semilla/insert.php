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
			INSERT INTO semillas (id_especieS, observacion, fecha_registro, cod_proveedor, estado) 
			VALUES (:id_especieS, :observacion, :fecha_registro, :cod_proveedor, :estado)
		");
		$result = $statement->execute(
			array(
				':id_especieS'	=>	$_POST["id_especieS"],
				':observacion'	=>	$_POST["observacion"],
				':fecha_registro'	=>	$_POST["fecha_registro"],
				':cod_proveedor'	=>	$_POST["cod_proveedor"],
				':estado'	=>	$_POST["estado"]
	
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
			"UPDATE semillas 
			SET observacion = :observacion, fecha_registro = :fecha_registro  
			WHERE cod_semilla = :cod_semilla
			"
		);
		$result = $statement->execute(
			array(
				':observacion'	=>	$_POST["observacion"],
				':fecha_registro'	=>	$_POST["fecha_registro"],
				':cod_semilla'	=>	$_POST["cod_semilla"]
			)
		);
		if(!empty($result))
		{
			echo 'datos editados correctamenete';
		}
	}


}

?>