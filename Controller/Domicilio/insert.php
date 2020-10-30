<?php 

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.domicilio.php');



if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare("
			INSERT INTO domicilio (cod_cliente, cod_empleado, direccion,estado,fecha, fechaEnrega, hora, tel_cliente) 
			VALUES (:cod_cliente, :cod_empleado, :direccion, :estado, :fecha, :fechaEnrega, :hora, :tel_cliente)
		");
		$result = $statement->execute(
			array(

				':cod_cliente'	=>	$_POST["cod_cliente"],
				':cod_empleado'	=>	$_POST["cod_empleado"],
				':direccion'	=>	$_POST["direccion"],
				':estado'	=>	$_POST["estado"],
				':fecha'	=>	$_POST["fecha"],
					':fechaEnrega'	=>	$_POST["fechaEnrega"],
						':hora'	=>	$_POST["hora"],
							':tel_cliente'	=>	$_POST["tel_cliente"]
	
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
			"UPDATE domicilio 
			SET cod_cliente = :cod_cliente, cod_empleado = :cod_empleado, direccion = :direccion, estado = :estado, fecha = :fecha, fechaEnrega = :fechaEnrega, hora = :hora,tel_cliente = :tel_cliente  
			WHERE cod_domicilio = :cod_domicilio
			"
		);
		$result = $statement->execute(
			array(
				':cod_cliente'	=>	$_POST["cod_cliente"],
				':cod_empleado'	=>	$_POST["cod_empleado"],
				':direccion'	=>	$_POST["direccion"],
				':estado'	=>	$_POST["estado"],
				':fecha'	=>	$_POST["fecha"],
					':fechaEnrega'	=>	$_POST["fechaEnrega"],
					':hora'	=>	$_POST["hora"],
					':tel_cliente'	=>	$_POST["tel_cliente"],

					':cod_domicilio'	=>	$_POST["cod_domicilio"]

			)
		);
		if(!empty($result))
		{
			echo 'datos editados correctamente';
		}
	}
}

 ?>