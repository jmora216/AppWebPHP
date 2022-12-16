<?php
require_once 'modelo/clsUsuario.php';
require_once 'modelo/clsConexion.php';
class clsUsuarioCRUD{
    private $conexion;
    private $auxPDO;

    public function __construct()
    {
        $this->conexion = new clsConexion('localhost', 'bdtaller2v2', 'root', '');
        $this->conexion->conectar();
        $this->auxPDO = $this->conexion->pdo;
    }

    /**
     * @param Int $filtro: indica el tipo de lista, 0 todos, 1 admin, 2 no admin
     */
    public function ListarUsuario($filtro){
        $cadenaConsulta = "";
        $resultado = array();
        if($filtro == 1){
            $cadenaConsulta = "SELECT * FROM usuario WHERE rol='admin'";    
        }else if($filtro ==2){
            $cadenaConsulta = "SELECT * FROM usuario WHERE rol='no-admin'";
        }else{
            $cadenaConsulta = "SELECT * FROM usuario";
        }
        try{
            $consulta = $this->auxPDO->prepare($cadenaConsulta);
            $consulta->execute();
            foreach( $consulta->fetchAll(PDO::FETCH_OBJ) as $obj){
                $auxUsuario = new clsUsuario();
                $auxUsuario->__SET('id',$obj->id);
                $auxUsuario->__SET('nombre',$obj->nombre);
                $auxUsuario->__SET('usuario',$obj->usuario);
                $auxUsuario->__SET('clave',$obj->clave);
                $auxUsuario->__SET('rol',$obj->rol);
                $resultado[] = $auxUsuario;
            }
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>