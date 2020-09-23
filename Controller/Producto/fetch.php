<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.producto.php');


$modelo = new Conexion();
$connection = $modelo->conectarbd();

$query = '';
$output = array();
$query .= "SELECT * FROM productos";



$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	
	$sub_array = array();

	$sub_array[] = $row["cod_producto"];
	$sub_array[] = $row["cod_proveedor"];
	$sub_array[] = $row["nombre_producto"];
	$sub_array[] = $row["descripcion"];

	
	$sub_array[] = '<button type="button" name="ver" cod_producto="'.$row["cod_producto"].'" class="btn btn-info btn-xs ver">Ver</button>';
	$sub_array[] = '<button type="button" name="update" cod_producto="'.$row["cod_producto"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" cod_producto="'.$row["cod_producto"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
   
   $msj = null;
	$consultas= new CProductos();

$output = array(



	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$msj = $consultas->get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>

