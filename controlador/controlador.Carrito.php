<?php

/**
 * Description of controlador
 *
 * @author Juliana Mora López
 */
require_once 'modelo/clsCarritoCRUD.php';
require_once 'modelo/clsProductoCRUD.php';

class controladorCarrito {

    //atributos
    private $crud;

    //metodos
    public function __construct() {
        $this->crud2 = new clsCarritoCRUD();
        $this->crud = new clsProductoCRUD();
    }

    public function Index() {
        require_once 'vista/paginaCarrito.php';
    }

    public function AgregarProducto() {
        $obj = new clsCarrito();
        if (isset($_REQUEST['codigo'])) {
            $obj = $this->crud->Obtener($_REQUEST['codigo']);
            $this->crud2->AgregarProducto($_SESSION['ID'], $obj);
        }
        if ($_SESSION['rol'] == 'admin') {
            require_once 'vista/paginaProductos.php';
        } else {
            require_once 'vista/paginaProductoNoAdmin.php';
        }
    }

    public function ListarCarrito() {
        $this->crud2->ListarCarrito($_SESSION['ID']);
        require_once 'vista/paginaCarrito.php';
    }
    
    public function EliminarProducto() {
        $this->crud2->EliminarProducto($_REQUEST['codigoProducto']);
        require_once 'vista/paginaCarrito.php';
    }

}
