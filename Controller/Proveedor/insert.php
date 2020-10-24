<?php 

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.proveedor.php');



if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare("
			INSERT INTO proveedor (direccion, nomP, tel_proveedor) 
			VALUES (:direccion, :nomP, :tel_proveedor)
		");
		$result = $statement->execute(
			array(

				':direccion'	=>	$_POST["direccion"],
				':nomP'	=>	$_POST["nomP"],
				':tel_proveedor'	=>	$_POST["tel_proveedor"]
	
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
			"UPDATE proveedor 
			SET nomP = :nomP, tel_proveedor = :tel_proveedor, direccion = :direccion  
			WHERE cod_proveedor = :cod_proveedor
			"
		);
		$result = $statement->execute(
			array(
				':nomP'	=>	$_POST["nomP"],
				':tel_proveedor'	=>	$_POST["tel_proveedor"],
				':direccion'	=>	$_POST["direccion"],
				':cod_proveedor'	=>	$_POST["cod_proveedor"]
			)
		);
		if(!empty($result))
		{
			echo 'datos editados correctamente';
		}
	}
}

 ?>