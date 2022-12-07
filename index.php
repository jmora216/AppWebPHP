 <?php
session_start();
 
$controlador = 'Principal';

if(!isset($_REQUEST['c']))
{
    require_once "controlador/controlador.$controlador.php";
    $controlador = "controlador".$controlador;
    $controlador = new $controlador;
    $controlador->Index();    
}
else
{
    $controlador = $_REQUEST['c'];
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    require_once "controlador/controlador.$controlador.php";
    $controlador = "controlador".$controlador;
    $controlador = new $controlador;
    
    call_user_func(array($controlador,$accion)); 

}