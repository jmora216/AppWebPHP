<?php

/**
 * Description of crudUsuario
 *
 * @author Juliana Mora López
 */
require_once 'modelo/clsConexion.php';
require_once 'modelo/clsUsuario.php';

class crudUsuario {

    //atributos
    private $auxUsuario;
    private $con;
    private $auxPDO;

    //metodos
    public function __construct() {
        $this->con = new clsConexion('localhost', 'bdtaller2v2', 'root', '');
        $this->con->conectar();
        $this->auxPDO = $this->con->pdo;
    }

    public function Validar($clave, $usuario) {
        try {
            $resultado = NULL;
            $consulta = $this->auxPDO->prepare("SELECT * FROM usuario WHERE clave = ? AND usuario = ?");
            $consulta->execute(array($clave, $usuario));

            foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $this->auxUsuario = new clsUsuario();

                $this->auxUsuario->__SET('id', $obj->id);
                $this->auxUsuario->__SET('nombre', $obj->nombre);
                $this->auxUsuario->__SET('usuario', $obj->usuario);
                $this->auxUsuario->__SET('clave', $obj->clave);
                $this->auxUsuario->__SET('rol', $obj->rol);

                $resultado = $this->auxUsuario;
            }

            return $resultado;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function Desconectar() {
        //mysqli_close($this->con);
        $this->con->desconectar();
    }

}
