<?php
/*creamos una funcion para poderla llamar si se necesita*/
class Conexion{

public function conectarbd(){

/*para poder conectarnos ingresamos datos importantes*/
$servidor='localhost';
$usuario='root';
$pass='';
$bd='ck_grow';
/*crear un objeto de la clase mysql - creamos la variable $conex para realizar la conexion y asi guardarla*/
try {
	$conexion = new PDO('mysql:host=localhost;dbname='.$bd,$usuario,$pass);

	/*echo "ok base de datos " ;*/

} catch (PDOException $ex) {
	die($ex->getMessage());
	echo "Ocurrió algo con la base de datos: " ;
	
}
/*con return j¿dejamos que retorne la variable $conex*/
return $conexion;
}
}
?>
