<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.plantas.php');




$modelo = new Conexion();
$connection = $modelo->conectarbd();

$query = '';
$output = array();
$query .= "SELECT * FROM plantas";


$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{


	
	$sub_array = array();

	$sub_array[] = $row["id_planta"];
	$sub_array[] = $row["cod_semilla"];
	$sub_array[] = $row["fecha_registro"];
	$sub_array[] = $row["id_especieP"];

	
	$sub_array[] = '<button type="button" name="ver" id_planta="'.$row["id_planta"].'" class="btn btn-info btn-xs ver">Ver</button>';
	$sub_array[] = '<button type="button" name="update" id_planta="'.$row["id_planta"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id_planta="'.$row["id_planta"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
   
   $msj = null;
	$consultas= new CPlantas();

$output = array(



	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$msj = $consultas->get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>

