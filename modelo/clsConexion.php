<?php

/**
 * Description of clsConexion
 *
 * @author Juliana Mora López
 */
class clsConexion {

    //atributos
    private $BDanfitrion;
    private $BDnombre;
    private $BDusuario;
    private $BDclave;
    private $pdo;
    private $estado = FALSE;

    //metodos
    public function __construct($BDanfitrion, $BDnombre, $BDusuario, $BDclave) {
        $this->BDanfitrion = $BDanfitrion;
        $this->BDnombre = $BDnombre;
        $this->BDusuario = $BDusuario;
        $this->BDclave = $BDclave;
    }

    public function conectar() {
        try {
            $dns = 'mysql:host=' . $this->BDanfitrion . ';';
            $dns .= 'dbname=' . $this->BDnombre . ';';
            $this->pdo = new PDO($dns, $this->BDusuario, $this->BDclave);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->estado = TRUE;
        } catch (PDOException $e) {
            $this->ExceptionLog($e, '', 'Connect');
        }
    }

    public function desconectar() {
        $this->estado = FALSE;
        $this->pdo = null;
    }

    public function __GET($atr) {
        return $this->$atr;
    }

}
