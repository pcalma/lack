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
			INSERT INTO proveedor (direccion, nombre_proveedor, tel_proveedor) 
			VALUES (:direccion, :nombre_proveedor, :tel_proveedor)
		");
		$result = $statement->execute(
			array(

				':direccion'	=>	$_POST["direccion"],
				':nombre_proveedor'	=>	$_POST["nombre_proveedor"],
				':tel_proveedor'	=>	$_POST["tel_proveedor"]
	
			)
		);
		if(!empty($result))
		{
			echo 'datos ingresados corectamente';
		}
	}
}

 ?>