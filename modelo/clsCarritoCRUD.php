<?php

/**
 * Description of clsProductoCRUD
 *
 * @author Juliana Mora López
 */
require_once 'modelo/clsConexion.php';
require_once 'modelo/clsProducto.php';
require_once 'modelo/clsCarrito.php';

class clsCarritoCRUD {
    
    //atributos
    private $conexion;
    private $auxPDO;

    //metodos
    public function __construct() {
        $this->conexion = new clsConexion('localhost', 'bdtaller2', 'root', '');
        $this->conexion->conectar();
        $this->auxPDO = $this->conexion->pdo;
    }
    
    public function AgregarProducto($id, clsProducto $obj) {
        try {
            $consulta = "INSERT INTO carrito (nombreProducto, precioProducto, id_usuario) VALUES (?, ?, ?)";
            $this->auxPDO->prepare($consulta)->execute(array($obj->nombre, $obj->precio, $id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarCarrito($id) {
        try {
            $resultado = array();

            $consulta = $this->auxPDO->prepare("SELECT * FROM carrito WHERE id_usuario=?");
            $consulta->execute(array($id));

            foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $this->auxProducto = new clsCarrito();
                $this->auxProducto->__SET('codigoProducto', $obj->codigoProducto);
                $this->auxProducto->__SET('nombreProducto', $obj->nombreProducto);
                $this->auxProducto->__SET('precioProducto', $obj->precioProducto);
                $resultado[] = $this->auxProducto;
            }

            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function EliminarProducto($codigoProducto) {
        try {
            $consulta = $this->auxPDO->prepare("DELETE FROM carrito WHERE codigoProducto=?");
            $consulta->execute(array($codigoProducto));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
