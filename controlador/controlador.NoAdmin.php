<?php

/**
 * Description of controlador
 *
 * @author Juliana Mora López
 */
require_once 'modelo/clsProductoCRUD.php';

class controladorNoAdmin {

    //atributos
    private $crud;

    //metodos
    public function __construct() {
        $this->crud = new clsProductoCRUD();
    }

    public function Index() {
        require_once 'vista/paginaProductoNoAdmin.php';
    }

}
