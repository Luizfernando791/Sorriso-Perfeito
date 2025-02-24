<?php
session_start();

require_once '../model/ModelLogin.php';


class UsuarioController {
    private $usuarioModel;

    public function __construct($database) {
        $this->usuarioModel = new UsuarioModel($database);
    }

    public function RegistrarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if ($this->usuarioModel->registrarUsuario($nome, $email, $senha)) {
                echo "Usuário registrado com sucesso!";
                header("Location: ../../SitePrincipal/HTML/login.html");
                exit;
            } else {
                $error = "O e-mail já está cadastrado!";
                require '../../SitePrincial/HTML/registrar.html';
            }
        }
    }

    public function LoginUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario = $this->usuarioModel->loginUsuario($email, $senha);
            if ($usuario) {
                $_SESSION['usuario_email'] = $usuario['email'];
                $_SESSION['usuario_nome'] = $usuario['nome'];

                if ($usuario['nome'] == "Admin") {
                    header("Location: ../view/PainelAdm.php");
                } else {
                    header("Location: ../view/PainelCliente.php");
                }

                exit;
            } else {
                header("Location: ../../SitePrincipal/HTML/Login.html");
                exit;
            }
        }
    }
}

?>
