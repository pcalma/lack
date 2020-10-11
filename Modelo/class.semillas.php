

<?php 

/**
 * 
 */
class CSemillas
{
	
	function get_total_all_records() 
	{
		$modelo = new Conexion();
		$connection = $modelo->conectarbd();
		$statement = $connection->prepare("SELECT * FROM semillas");
		$statement->execute();
		$result  = $statement->fetchAll();
	return $statement->rowCount();
	}



public function verSemillasDropdown(){

            $rows = null;
		    $modelo = new Conexion();
			$conex = $modelo->conectarbd();
$stmt = $conex->query("SELECT * FROM semillas JOIN especies
USING (id_especieS) JOIN proveedor USING (cod_proveedor)");


echo "<select name='id_especieS'>";
echo "<option>selecciona una especies </option>";
//$stmt = $pdo->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo "<option value='" . $row['id_especieS'] . "'>" . $row['id_especieS'] . "</option>";
}
echo "</select>";

}

}




 ?>