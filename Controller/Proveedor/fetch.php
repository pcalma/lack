<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.proveedor.php');

$modelo = new Conexion();
$connection = $modelo->conectarbd();

$query = '';
$output = array();
$query .= "SELECT * FROM proveedor ";



$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	
		$sub_array = array();

	$sub_array[] = $row["cod_proveedor"];


	
}
   
   $msj = null;
	$consultas= new CProveedor();

$output = array(



	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$msj = $consultas->get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>

