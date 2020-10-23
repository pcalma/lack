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
INSERT INTO productos (cod_proveedor, descripcion, nombre_producto, cantidad, precio) 
			VALUES (:cod_proveedor, :descripcion, :nombre_producto, :cantidad, :precio)
		");
		$result = $statement->execute(
			array(

				':cod_proveedor'	=>	$_POST["cod_proveedor"],
				':descripcion'	=>	$_POST["descripcion"],
				':nombre_producto'	=>	$_POST["nombre_producto"],
				':cantidad'	=>	$_POST["cantidad"],
				':precio'	=>	$_POST["precio"]
	
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
			"UPDATE productos 
			SET cod_proveedor = :cod_proveedor, descripcion = :descripcion, nombre_producto = :nombre_producto, cantidad = :cantidad, precio = :precio 
	WHERE cod_producto = :cod_producto
		");
		$result = $statement->execute(
			array(

				':cod_proveedor'	=>	$_POST["cod_proveedor"],
				':descripcion'	=>	$_POST["descripcion"],
				':nombre_producto'	=>	$_POST["nombre_producto"],
				':cantidad'	=>	$_POST["cantidad"],
				':precio'	=>	$_POST["precio"],
				':cod_producto'	=>	$_POST["cod_producto"]
	
			)
		);
		if(!empty($result))
		{
			echo 'datos editados correctamente';
		}
	}



/*		if($_POST["operation"] == "Ver")
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
*/

}

?>