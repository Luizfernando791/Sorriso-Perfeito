<?php

require_once '../model/database.php';
require_once '../controller/RegistroController.php';

$database = new Database();
$db = $database->getConnection();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'user';
$action = isset($_GET['action']) ? $_GET['action'] : 'RegistrarUsuario';

if ($controller === 'user') {
    $usuarioController = new UsuarioController($db);
    
    if ($action === 'RegistrarUsuario') {
        $usuarioController->RegistrarUsuario();
    } else {
        $usuarioController->LoginUsuario();
    }
}
?>