<?php

include '../../Modelo/UsuarioDao.php';
//usuario lea y envia a la vista 
class UsuarioControlador{

    public static function login($nombre_cliente, $pass){


        $obj_nombre_cliente = new Sesiones();
        //video 9 
        $obj_nombre_cliente->setNombre_cliente($nombre_cliente);
        $obj_nombre_cliente->setPass($pass);

        return UsuarioDao::login($obj_nombre_cliente);


    }

    public function getNombre_cliente($nombre_cliente, $pass){

    	$obj_nombre_cliente = new Sesiones();
        //video 15 
        $obj_nombre_cliente->setNombre_cliente($nombre_cliente);
        $obj_nombre_cliente->setPass($pass);

        return UsuarioDao::getNombre_cliente($obj_nombre_cliente);


    }
        public function registrarUser($nombre_u, $email, $nombre_cliente, $pass, $id_rol)
    {
        $obj_nombre_cliente = new Sesiones();
        $obj_nombre_cliente->setNombre_u($nombre_u);
        $obj_nombre_cliente->setEmail($email);
        $obj_nombre_cliente->setNombre_cliente($nombre_cliente);
        $obj_nombre_cliente->setPass($pass);
        $obj_nombre_cliente->setId_rol($id_rol);
        

        return UsuarioDao::registrarUser($obj_nombre_cliente);
    }
}
 ?>