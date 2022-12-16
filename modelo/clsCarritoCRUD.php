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
        $this->conexion = new clsConexion('localhost', 'bdtaller2v2', 'root', '');
        $this->conexion->conectar();
        $this->auxPDO = $this->conexion->pdo;
    }
    
    public function AgregarProducto($id, clsProducto $obj) {
        try {
            //$consulta = "INSERT INTO carrito (nombreProducto, precioProducto, id_usuario) VALUES (?, ?, ?)";
            $consulta = "insert into carrito(id_producto, id_usuario) values(?,?)";
            //$this->auxPDO->prepare($consulta)->execute(array($obj->nombre, $obj->precio, $id));
            $this->auxPDO->prepare($consulta)->execute(array($obj->codigo,$id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarCarrito($id) {
        try {
            $resultado = array();

            //$consulta = $this->auxPDO->prepare("SELECT * FROM carrito WHERE id_usuario=?");
            $consulta = $this->auxPDO->prepare("select c.id, p.codigo codigoProducto, p.nombre nombreProducto, p.precio precioProducto from producto as p inner join carrito as c on p.codigo=c.id_producto inner join usuario as u on u.id=c.id_usuario where u.id = ?");
            $consulta->execute(array($id));

            foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $this->auxProducto = new clsCarrito();
                $this->auxProducto->__SET('id', $obj->id);
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
    
    public function EliminarProducto($codigoProducto, $idUsuario) {
        try {
            $consulta = $this->auxPDO->prepare("DELETE FROM carrito WHERE id=? and id_usuario=?");
            $consulta->execute(array($codigoProducto,$idUsuario));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
