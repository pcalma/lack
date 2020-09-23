
<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.cliente.php');

$mensaje;


$apellido_cliente = $_POST['apellido_cliente'];
$cedula = $_POST['cedula'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$estado = $_POST['estado'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$fecha_registro = $_POST['fecha_registro'];  
$genero = $_POST['genero'];
$id_rol = $_POST['id_rol'];
$nombre_cliente = $_POST['nombre_cliente'];
$nombre_u = $_POST['nombre_u'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$tel_cliente = $_POST['tel_cliente'];











/*strlen se usa para saber la longitud der las cadenas 
if(strlen($cod_cliente)>0 && count($edad)>0 && count($estado)>0 && count($genero)>0 && count($nombre_cliente)>0 && count($tel_cliente)>0){
*/
/*$consultas en una variable dende va a estar el objeto consultas y se llama al metodo insertarCñiente, e insertarClentte va a tener las variables ... y como devuelve una cadena de caracteres se guarda en $mensaje */


	$consultas= new ConsultasClientes();

 $mensaje=$consultas->insertarCliente($apellido_cliente,$cedula,$edad,$email,$estado,
 	$fecha_nacimiento,$fecha_registro,$genero,$id_rol,$nombre_cliente,$nombre_u,$pass,$pass2,$tel_cliente);


 //echo "<a href='../../Vista/cliente/insertarCliente.html'> Nuevo cliente</a>";
 //echo "-";
 //echo "<a href='../../Vista/cliente/verCliente.php'> ver cliente</a>";

/*
}else{
	echo "por favor completar los campos";
}
*/
//echo $mensaje;

?>		