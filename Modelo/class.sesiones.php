<?php 
// video 9 
include 'class.conexion.php';
include '../../entidades/Usuario.php';

//extienda de la clase conexion ereda todo lo que tenga conexion  
class UsuarioDao  extends Conexion 
{

    protected static $con;

    //generar funsion para conectarnos en todo momento

    private static function getConexion(){
//invocamos la clase y que invoque $con
        self::$con = Conexion::conectarbd();

    }


//metodo para desconectarnos 
      /**
     * Metodo que sirve para validar el login
     *
     * @param      object         $usuario
     * @return     boolean
     */

    private static function desconectar(){

        self::$con = null;

    }

//va a recibir un usurai como parametro 
        /**
     * Metodo que sirve para validar el login
     *
     * @param      object         $usuario
     * @return     boolean
     */

    public static function login($nombre_cliente)
    {
// como el resulatdo es booleano tiene que quedar SELECT *
$sql = "SELECT * FROM cliente WHERE nombre_cliente like :nombre_cliente AND pass like :pass";


  self::getConexion();

  $resultado = self::$con->prepare($sql);

  $resultado->bindValue(":nombre_cliente", $nombre_cliente->getNombre_cliente());
  $resultado->bindValue(":pass", $nombre_cliente->getPass());

   $resultado->execute();
//contabilizar si esta devolviendo objetos (cuente la cantidad de resultados)
   if($resultado->rowCount() > 0){
    //si tiene redultados 
   //   return true;
    $filas = $resultado->fetch(); //fetch va a rellenar toda la informacion del resultado en la variable $filas lo va a tratar  array
    //si $filas en la posicion[nombre cliente]==$nombre_cliente(public static function login($nombre_cliente))->getNombre_cliente(treaemos el nombre). Trae la informacion por medio del objeto (public static function login($nombre_cliente)
    if($filas["nombre_cliente"]==$nombre_cliente->getNombre_cliente() && $filas["pass"]==$nombre_cliente->getPass()){
        return true;
    }
   }
   //si no tiene resultados
   return false;

    }




//obtener un usuario 
        public static function getNombre_cliente($nombre_cliente)
    {
// como el resulatdo es booleano tiene que quedar SELECT *
$sql = "SELECT cod_cliente,email,nombre_cliente,id_rol,nombre_u FROM cliente WHERE nombre_cliente like :nombre_cliente AND pass like :pass";
//rol,fecha_registro

  self::getConexion();

  $resultado = self::$con->prepare($sql);

  $resultado->bindValue(":nombre_cliente", $nombre_cliente->getNombre_cliente());
  $resultado->bindValue(":pass", $nombre_cliente->getPass());

   $resultado->execute();

   $filas = $resultado->fetch();

    $nombre_cliente = new Sesiones();
    $nombre_cliente->setCod_cliente($filas["cod_cliente"]);
    $nombre_cliente->setEmail($filas["email"]);
    $nombre_cliente->setNombre_cliente($filas["nombre_cliente"]);
    $nombre_cliente->setId_rol($filas["id_rol"]);
    $nombre_cliente->setNombre_u($filas["nombre_u"]);

return $nombre_cliente;
    }

        public static function registrarUser($nombre_cliente)
    {
// como el resulatdo es booleano tiene que quedar SELECT *
$sql = "INSERT INTO cliente (nombre_cliente,nombre_u,email,pass,id_rol) values (:nombre_cliente,:nombre_U,:email,:pass,:id_rol)";


  self::getConexion();

  $resultado = self::$con->prepare($sql);

  $resultado->bindValue(":nombre_cliente", $nombre_cliente->getNombre_cliente());
  $resultado->bindValue(":nombre_u", $nombre_cliente->getNombre_u());
  $resultado->bindValue(":email", $nombre_cliente->getEmail());
  $resultado->bindValue(":pass", $nombre_cliente->getPass());
  $resultado->bindValue(":id_rol", $nombre_cliente->getId_rol());
       

        if ($resultado->execute()) {
            return true;
        }

 return false;
    }



}


 ?>