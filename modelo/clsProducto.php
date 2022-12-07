<?php

/**
 * Description of clsProducto
 *
 * @author Juliana Mora López
 */
class clsProducto {

    //atributos
    private $codigo;
    private $nombre;
    private $precio;

    //metodos
    public function __construct() {
        
    }

    public function __GET($atr) {
        return $this->$atr;
    }

    public function __SET($atr, $val) {
        return $this->$atr = $val;
    }

}
