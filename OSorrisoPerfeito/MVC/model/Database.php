<?php
class Database {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $database = 'Crud';

    public $conn;

    public function getConnection() {
        $this->conn = new mysqli($this->host, $this->usuario, $this->senha, $this->database);

        if ($this->conn->connect_error) {
            die("Erro na conexão: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
?>
