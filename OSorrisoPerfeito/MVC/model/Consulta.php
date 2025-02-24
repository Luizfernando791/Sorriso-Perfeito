<?php
session_start();
require_once '../model/Database.php';

class Consulta {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function criarConsulta($nome, $email, $data_consulta, $horario, $doutor) {
        $query = "INSERT INTO consultas (nome, email, data_consulta, horario, doutor) VALUES ('$nome', '$email', '$data_consulta', '$horario', '$doutor')";

        return mysqli_query($this->conn, $query);
    }

    public function updateConsulta($id, $nome, $email, $data_consulta, $horario, $doutor) {
        $query = "UPDATE consultas SET nome = '$nome', email = '$email', data_consulta = '$data_consulta', horario = '$horario', doutor = '$doutor'";

        $query .= " WHERE id = '$id'";

        return mysqli_query($this->conn, $query);
    }

    
    public function deleteConsulta($id) {
        $query = "DELETE FROM consultas WHERE id = '$id'";

        return mysqli_query($this->conn, $query);
    }
}


if (isset($_POST['update_consulta'])) {
    $id = $_POST['usuario_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_consulta = $_POST['data_consulta'];
    $horario = $_POST['horario'];
    $doutor = $_POST['doutor'];

    $controller = new Consulta();

    if ($controller->updateConsulta($id, $nome, $email, $data_consulta, $horario, $doutor)) {
        $_SESSION['mensagem'] = 'Usuário Atualizado!';
        header("Location: ../view/PainelAdm.php");
        exit();
    } else {
        $_SESSION['mensagem'] = 'Usuário Não Atualizado';
        header("Location: ../view/PainelAdm.php");
        exit();
    }
}

if (isset($_POST['delete_consulta'])) {
    $id = $_POST['delete_consulta'];

    $controller = new Consulta();
    if ($controller->deleteConsulta($id)) {
        $_SESSION['mensagem'] = 'Usuário Removido com sucesso!';
        header("Location: ../view/PainelAdm.php");
        exit();
    } else {
        $_SESSION['mensagem'] = 'Não foi possível remover o usuário';
        header("Location: ../view/PainelAdm.php");
        exit();
    }
}

if (isset($_POST['create_consulta'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_consulta = $_POST['data_consulta'];
    $horario = $_POST['horario'];
    $doutor = $_POST['doutor'];

    $controller = new Consulta();
    if ($controller->criarConsulta($nome, $email, $data_consulta, $horario, $doutor)) {
        $_SESSION['mensagem'] = 'Usuário criado com sucesso!';
        header("Location: ../view/PainelAdm.php");
        exit();
    } else {
        $_SESSION['mensagem'] = 'Não foi possível criar o usuário';
        header("Location: ../view/PainelAdm.php");
        exit();
    }
}
?>
