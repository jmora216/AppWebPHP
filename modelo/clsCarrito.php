<?php

/**
 * Description of clsCarrito
 *
 * @author Juliana Mora López
 */
class clsCarrito {

    //atributos
    private $id;
    private $codigoProducto;
    private $nombreProducto;
    private $precioProducto;
    private $usuario_id;

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
