<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.plantas.php');




$modelo = new Conexion();
$connection = $modelo->conectarbd();

$query = '';
$output = array();
$query .= "SELECT * FROM especies INNER JOIN semillas USING(id_especieS) INNER JOIN plantas USING(cod_semilla) INNER JOIN especiep USING(id_especieP)";




if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nombre_planta LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nombreP LIKE "%'.$_POST["search"]["value"].'%" ';
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

	$sub_array[] = $row["id_planta"];
	$sub_array[] = $row["nombre_planta"];
	$sub_array[] = $row["fecha_registro"];
	$sub_array[] = $row["nombreP"];

	
	$sub_array[] = '<button id="add_button2" data-toggle="modal" data-target="#userModal2" type="button" name="ver" id_planta="'.$row["id_planta"].'" class="btn btn-info btn-xs ver">Ver</button>';



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

