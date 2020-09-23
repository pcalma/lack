<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.producto.php');



if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare("
			INSERT INTO productos (cantidad, cod_proveedor, descripcion, nombre_producto, precio) 
			VALUES (:cantidad, :cod_proveedor, :descripcion, nombre_producto, :precio)
		");
		$result = $statement->execute(
			array(

				':cantidad'	=>	$_POST["cantidad"],
				':cod_proveedor'	=>	$_POST["cod_proveedor"],
				':descripcion'	=>	$_POST["descripcion"],
				':nombre_producto'	=>	$_POST["nombre_producto"],
				':precio'	=>	$_POST["precio"]
	
			)
		);
		if(!empty($result))
		{
			echo 'datos ingresados corectamente';
		}
	}





		if($_POST["operation"] == "Ver")
	{
	

	$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare(
			"SELECT * FROM productos WHERE cod_producto = :cod_producto"
		);
		$result = $statement->execute(
			array(
				':descripcion'	=>	$_POST["descripcion"],
				':nombre_producto'	=>	$_POST["nombre_producto"],
				':cod_producto'	=>	$_POST["cod_producto"]
			)
		);

	}


}

?>