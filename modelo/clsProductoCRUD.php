<?php

/**
 * Description of clsProductoCRUD
 *
 * @author Juliana Mora López
 */
require_once 'modelo/clsConexion.php';
require_once 'modelo/clsProducto.php';
require_once 'modelo/clsCarrito.php';

class clsProductoCRUD {

    //atributos
    private $conexion;
    private $auxPDO;

    //metodos
    public function __construct() {
        $this->conexion = new clsConexion('localhost', 'bdtaller2v2', 'root', '');
        $this->conexion->conectar();
        $this->auxPDO = $this->conexion->pdo;
    }

    public function Listar($valor) {
        try {
            $resultado = array();
            if($valor==-1 || $valor==null || $valor==""){
                $cadenaConsulta = 'SELECT * FROM producto';
            }else{
                $cadenaConsulta = 'SELECT * FROM producto WHERE precio <= ?';
            }
            //$consulta = $this->auxPDO->prepare("SELECT * FROM producto");
            $consulta = $this->auxPDO->prepare($cadenaConsulta);
            if($valor==-1 || $valor==null || $valor==""){
                $consulta->execute();   
            }else{
                $consulta->execute(array($valor));   
            }

            foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $this->auxProducto = new clsProducto();
                $this->auxProducto->__SET('codigo', $obj->codigo);
                $this->auxProducto->__SET('nombre', $obj->nombre);
                $this->auxProducto->__SET('precio', $obj->precio);
                $resultado[] = $this->auxProducto;
            }

            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($codigo) {
        $consulta = $this->auxPDO->prepare("SELECT * FROM producto WHERE codigo=?");
        $consulta->execute(array($codigo));

        $auxProducto = new clsProducto();
        foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj) {
            $auxProducto->__SET('codigo', $obj->codigo);
            $auxProducto->__SET('nombre', $obj->nombre);
            $auxProducto->__SET('precio', $obj->precio);
        }
        return $auxProducto;
    }

    public function Crear(clsProducto $obj) {
        try {
            $consulta = "INSERT INTO producto (nombre, precio) VALUES (?, ?)";
            $this->auxPDO->prepare($consulta)->execute(array($obj->nombre, $obj->precio));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(clsProducto $obj) {
        try {
            $consulta = "UPDATE producto SET nombre=?, precio=? WHERE codigo=?";
            $this->auxPDO->prepare($consulta)->execute(array($obj->nombre, $obj->precio, $obj->codigo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($codigo) {
        try {
            $consulta = $this->auxPDO->prepare("DELETE FROM producto WHERE codigo=?");
            $consulta->execute(array($codigo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
