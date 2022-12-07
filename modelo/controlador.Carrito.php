<?php

/**
 * Description of controlador
 *
 * @author Juliana Mora López
 */
require_once 'modelo/clsProductoCRUD.php';
require_once 'modelo/clsCarritoCRUD.php';

class controladorCarrito {

    //atributos
    private $crud;

    //metodos
    public function __construct() {
        $this->crud = new clsProductoCRUD();
        $this->crud = new clsCarritoCRUD;
    }

    public function Index() {
        require_once 'vista/paginaCarrito.php';
    }

    public function AgregarCarrito() {
        $obj = new clsProducto();
        if (isset($_REQUEST['codigo'])) {
            $obj = $this->crud->Obtener($_REQUEST['codigo']);
            $this->crud->AgregarCarrito($_SESSION['ID'], $obj);
        }
        if ($_SESSION['rol'] == 'admin') {
            require_once 'vista/paginaProductos.php';
        } else {
            require_once 'vista/paginaProductoNoAdmin.php';
        }
    }

    public function ListarCarrito() {
        $this->crud->ListarCarrito($_SESSION['ID']);
        require_once 'vista/paginaCarrito.php';
    }

}
