<?php

/**
 * Description of controlador principal
 *
 * @author Juliana Mora López
 */
require_once 'modelo/crudUsuario.php';
require_once 'modelo/clsConexion.php';

class controladorPrincipal {

    //atributos
    private $crud;

    //metodos
    public function __construct() {
        $this->crud = new crudUsuario();
    }

    public function Index() {
        require_once 'vista/inicioSesion.php';
    }

    public function AsignarControlador() {

        $username = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");

        $user = $this->crud->Validar($password, $username);

        if ($user) {
            $_SESSION['usuario'] = $username;
            $_SESSION['clave'] = $password;
            $_SESSION['ID'] = $user->id;
            $_SESSION['rol'] = $user->rol;

            if ($_SESSION['rol'] == 'admin') {
                require_once "controlador/controlador.Admin.php";
                $controlador = "controlador" . "Admin";
                $controlador = new $controlador;
                $controlador->Index();
            } else {
                require_once "controlador/controlador.NoAdmin.php";
                $controlador = "controlador" . "NoAdmin";
                $controlador = new $controlador;
                $controlador->Index();
            }
        } else {
            header("location: index.php");
        }
    }

    public function cerrarSesion() {
        $this->crud->Desconectar();
        session_destroy();
        header("location: index.php");
    }

}
