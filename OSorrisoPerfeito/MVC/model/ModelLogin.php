<?php

class UsuarioModel {
    private $conn;

    public function __construct($database) {
        $this->conn = $database;
    }

    public function emailExists($email) {
        $query = "SELECT id FROM registros WHERE email = '$email'";
        $result = $this->conn->query($query);

        return $result->num_rows > 0;
    }

    public function registrarUsuario($nome, $email, $senha) {
        if ($this->emailExists($email)) {
            return false; 
        }

        $query = "INSERT INTO registros (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        return $this->conn->query($query);
    }

    public function loginUsuario($email, $senha) {
        // Previne SQL Injection
        $email = $this->conn->real_escape_string($email);
        $senha = $this->conn->real_escape_string($senha);

        $_SESSION['usuario_email'] = $usuario['email'];
        $_SESSION['usuario_nome'] = $usuario['nome']; 
    
        $query = "SELECT * FROM registros WHERE email = '$email' AND senha = '$senha'";
        $result = $this->conn->query($query);
    
        return $result->fetch_assoc();
    }
}

?>
