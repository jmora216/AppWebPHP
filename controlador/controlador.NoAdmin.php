<?php

/**
 * Description of controlador
 *
 * @author Juliana Mora López
 */
require_once 'modelo/clsProductoCRUD.php';

class controladorNoAdmin {

    private $lista;
    //atributos
    private $crud;
    private $precio=-1;

    //metodos
    public function __construct() {
        $this->crud = new clsProductoCRUD();
    }
    
    public function Index() {
        $precio = -1;
        $this->Listar();
    }
    
     public function Listar(){
        $this->precio = filter_input(INPUT_POST, "precio");
        $this->lista = $this->crud->Listar($this->precio);
        require_once 'vista/paginaProductos.php';
    }
}
