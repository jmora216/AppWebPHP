<?php
require_once 'modelo/clsUsuarioCRUD.php';
require_once 'modelo/clsUsuario.php';
class controladorConsultas{
    private $crud;
    private $lista = array();

    public function __construct()
    {
        $this->crud = new clsUsuarioCRUD();
    }
    //TODO: crear vista index para funcionalidad
    public function Index(){
        $this->listarUsuarios();
    }
    public function listarUsuarios(){
        $dato = filter_input(INPUT_POST, "tipo");
        $tipo=0;
        if($dato==null || $dato=="" || $tipo == "todos"){ 
            $tipo=0;
        }
        if($dato=="administradores"){
            $tipo=1;
        }
        if($dato=="usuarios"){
            $tipo=2;
        }
        $this->lista = $this->crud->ListarUsuario($tipo);
        require_once 'vista/paginaConsultas.php';
    }
    //recibe un ID desde formulario para listarlo.
    //TODO: usar modelo carritlo para ello. listarcarrito
    public function mostrarCarrito(){

    }

    //todo: recibe un valor por el cual ser filtrado.
    public function filtarProductos(){

    }
}
?>