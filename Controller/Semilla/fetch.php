<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.semillas.php');


$modelo = new Conexion();
$connection = $modelo->conectarbd();

$query = '';
$output = array();
$query .= "SELECT * FROM semillas JOIN especies
USING (id_especieS) JOIN proveedor USING (cod_proveedor)";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nombre_semilla LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR observacionS LIKE "%'.$_POST["search"]["value"].'%" ';
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

	$sub_array[] = $row["cod_semilla"];
	$sub_array[] = $row["nombre_semilla"];
	$sub_array[] = $row["observacionS"];
	$sub_array[] = $row["fecha_registroS"];

	
	$sub_array[] = '<button id="add_button2" data-toggle="modal" data-target="#userModal2" type="button" name="ver" cod_semilla="'.$row["cod_semilla"].'" class="btn btn-info   btn-xs ver">Ver</button>';

	$sub_array[] = '<button type="button" name="update" cod_semilla="'.$row["cod_semilla"].'" class="btn btn-warning btn-xs update">Update</button>';

	$sub_array[] = '<button type="button" name="delete" cod_semilla="'.$row["cod_semilla"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
   
   $msj = null;
	$consultas= new CSemillas();

$output = array(



	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$msj = $consultas->get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>

	