<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.cliente.php');



if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare("
			INSERT INTO cliente (nombre_cliente, nombre_u, edad, estado, genero, tel_cliente,id_rol, fecha_nacimiento, apellido_cliente, email, pass, cedula, fecha_registro) 
			VALUES (:nombre_cliente, :nombre_u, :edad, :estado, :genero,:tel_cliente,:id_rol, :fecha_nacimiento, :apellido_cliente, :email, :pass, :cedula, :fecha_registro)
		");
		$result = $statement->execute(
			array(
				':nombre_cliente'	=>	$_POST["nombre_cliente"],
				':nombre_u'	=>	$_POST["nombre_u"],


				':edad'	=>	$_POST["edad"],
				':estado'	=>	$_POST["estado"],
				':genero'	=>	$_POST["genero"],
				':tel_cliente'	=>	$_POST["tel_cliente"],
				':id_rol'	=>	$_POST["id_rol"],
				':fecha_nacimiento'	=>	$_POST["fecha_nacimiento"],
				':apellido_cliente'	=>	$_POST["apellido_cliente"],
				':email'	=>	$_POST["email"],
				':pass'	=>	$_POST["pass"],
				':cedula'	=>	$_POST["cedula"],
				':fecha_registro'	=>	$_POST["fecha_registro"]
	
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
			"UPDATE cliente 
			SET nombre_cliente = :nombre_cliente, nombre_u = :nombre_u  
			WHERE cod_cliente = :cod_cliente
			"
		);
		$result = $statement->execute(
			array(
				':nombre_cliente'	=>	$_POST["nombre_cliente"],
				':nombre_u'	=>	$_POST["nombre_u"],
				':cod_cliente'	=>	$_POST["cod_cliente"]
			)
		);
		if(!empty($result))
		{
			echo 'datos editados correctamenete';
		}
	}


}

?>