<?php

/**
 * Description of clsUsuario
 *
 * @author Juliana Mora López
 */
class clsUsuario {

    //atributos
    private $id;
    private $nombre;
    private $apellido;
    private $usuario;
    private $clave;

    //metodos
    public function __GET($atr) {
        return $this->$atr;
    }

    public function __SET($atr, $val) {
        return $this->$atr = $val;
    }

}
