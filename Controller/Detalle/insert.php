<?php 

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.detalle.php');



if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare("
			INSERT INTO detalle (descripcionD, id_categoria, img_deta,nombreD,precioD) 
			VALUES (:descripcionD, :id_categoria, :img_deta, :nombreD, :precioD)
		");
		$result = $statement->execute(
			array(

				':descripcionD'	=>	$_POST["descripcionD"],
				':id_categoria'	=>	$_POST["id_categoria"],
				':img_deta'	=>	$_POST["img_deta"],
				':nombreD'	=>	$_POST["nombreD"],
				':precioD'	=>	$_POST["precioD"]
	
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
			"UPDATE detalle 
			SET descripcionD = :descripcionD, id_categoria = :id_categoria, img_deta = :img_deta, nombreD = :nombreD, precioD = :precioD  
			WHERE cod_detalle = :cod_detalle
			"
		);
		$result = $statement->execute(
			array(
				':descripcionD'	=>	$_POST["descripcionD"],
				':id_categoria'	=>	$_POST["id_categoria"],
				':img_deta'	=>	$_POST["img_deta"],
				':nombreD'	=>	$_POST["nombreD"],
				':precioD'	=>	$_POST["precioD"],
				':cod_detalle'	=>	$_POST["cod_detalle"]

			)
		);
		if(!empty($result))
		{
			echo 'datos editados correctamente';
		}
	}
}

 ?>