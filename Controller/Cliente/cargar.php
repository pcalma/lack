<?php 

function dropdownSemillas(){

	$consultas = new ConsultarEmpleados();
$filas = $consultas->verEmpleadosDropdown();
}


 ?>