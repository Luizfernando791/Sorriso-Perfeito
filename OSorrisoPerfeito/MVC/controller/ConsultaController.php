<?php
require_once '../model/Consulta.php';

class ConsultaController {
    private $consulta;
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->consulta = new Consulta($this->conn);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $consultaController = new ConsultaController();
    $consultaController->create(
        $_POST['nome'],
        $_POST['email'],
        $_POST['data_consulta'],
        $_POST['horario'],
        $_POST['doutor']
    );
}


?>
