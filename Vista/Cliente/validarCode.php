<?php

include '../../Controller/Sesiones/UsuarioControlador.php';
include '../../helps/helps.php';

   if(!isset($_SESSION)) 
    { 
        session_start(); 
     
//validacion de campos para la seguridad 
header('Content-type: application/json');
$resultado = array();

//validar que el envio sea de tipo requeste post POST - 
//vamos a hacer uso de la variable SERVER 
if($_SERVER["REQUEST_METHOD"]=="POST"){

      if (isset($_POST["nombre_cliente"]) && isset($_POST["pass"])) {
//validar_campo para limpiarlo
        $nombre_cliente  = validar_campo($_POST["nombre_cliente"]);
        $pass = validar_campo($_POST["pass"]);

        $resultado = array("estado" => "true");

         if (UsuarioControlador::login($nombre_cliente, $pass)) {
       
      // return  print(json_encode($resultado));//base para la validacion 
      $sesiones = UsuarioControlador::getNombre_cliente($nombre_cliente, $pass);
     //echo $sesiones->getNombre_cliente();
                  $_SESSION["sesiones"] = array (
                "cod_cliente"    => $sesiones->getCod_cliente(),
                "nombre_cliente" => $sesiones->getNombre_cliente(),
                "email"          => $sesiones->getEmail(),
                "id_rol"         => $sesiones->getId_rol(),
                "nombre_u"         => $sesiones->getNombre_u(),
            );
                  return print(json_encode($resultado));
        }

}  
}
}

$resultado = array("estado" => "false");
 return  print(json_encode($resultado)); 

  ?>

  

