<?php   


class Sesiones{
//
        private $cod_cliente;
        private $edad;
        private $estado;
        private $genero;
        private $nombre_cliente;
        private $tel_cliente;
        private $id_rol;
        private $nombre_u;
        private $email;
        private $pass;
        

 

public function getCod_cliente(){
        return $this->cod_cliente;
    }
public function setCod_cliente($cod_cliente){
        $this->cod_cliente = $cod_cliente;
    }

public function getEdad(){
        return $this->edad;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getNombre_cliente(){
        return $this->nombre_cliente;
    }

    public function setNombre_cliente($nombre_cliente){
        $this->nombre_cliente = $nombre_cliente;
    }

    public function getTel_cliente(){
        return $this->tel_cliente;
    }

    public function setTel_cliente($tel_cliente){
        $this->tel_cliente = $tel_cliente;
    }

    public function getId_rol(){
        return $this->id_rol;
    }

    public function setId_rol($id_rol){
        $this->id_rol = $id_rol;
    }

    public function getNombre_u(){
        return $this->nombre_u;
    }

    public function setNombre_u($nombre_u){
        $this->nombre_u = $nombre_u;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPass(){
        return $this->pass;
    }

    public function setPass($pass){
        $this->pass = $pass;
    }




}




 ?>