<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.domicilio.php');


$modelo = new Conexion();
$connection = $modelo->conectarbd();

$query = '';
$output = array();
$query .= "SELECT * FROM domicilio ";


if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE cod_domicilio LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR estado LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	
	$sub_array = array();

	$sub_array[] = $row["cod_domicilio"];
	$sub_array[] = $row["direccion"];
	$sub_array[] = $row["estado"];
	$sub_array[] = $row["fechaEnrega"];

	
	$sub_array[] = '<button type="button" name="ver" cod_domicilio="'.$row["cod_domicilio"].'" class="btn btn-info btn-xs ver">Ver</button>';
	$sub_array[] = '<button type="button" name="update" cod_domicilio="'.$row["cod_domicilio"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" cod_domicilio="'.$row["cod_domicilio"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
   
   $msj = null;
	$consultas= new CDomicilio();

$output = array(



	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$msj = $consultas->get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>

