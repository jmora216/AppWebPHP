<?php

/**
 * Description of controlador
 *
 * @author Juliana Mora López
 */
require_once 'modelo/clsProductoCRUD.php';

class controladorAdmin {

    //atributos
    private $crud;
    private $lista;
    private $precio=-1;

    //metodos
    public function __construct() {
        $this->crud = new clsProductoCRUD();
        $this->lista = array();
    }

    public function Index() {
        $this->Listar();
    }
     public function Listar(){
        $this->precio = filter_input(INPUT_POST, "precio");
        $this->lista = $this->crud->Listar($this->precio);
        require_once 'vista/paginaProductos.php';
    }

    public function Formulario() {
        $obj = new clsProducto();
        if (isset($_REQUEST['codigo'])) {
            $obj = $this->crud->Obtener($_REQUEST['codigo']);
        }
        require_once 'vista/formularioProducto.php';
    }

    public function Guardar() {
        $obj = new clsProducto();
        $obj->codigo = $_REQUEST['codigo'];
        $obj->nombre = $_REQUEST['nombre'];
        $obj->precio = $_REQUEST['precio'];
        if ($obj->codigo > 0) {
            $this->crud->Actualizar($obj);
        } else {
            $this->crud->Crear($obj);
        }
        header("Location: index.php?c=Admin&a=Index");
    }

    public function Eliminar() {
        $this->crud->Eliminar($_REQUEST['codigo']);
        $this->Listar();
        require_once 'vista/paginaProductos.php';
    }

}
