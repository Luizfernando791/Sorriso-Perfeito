<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include('../model/NavBar.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Usuário
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <?php

                        require '../model/Database.php';

                        $database = new Database();
                        $conn = $database->getConnection();

                        if (isset($_GET['id'])) {
                            $consulta_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $sql = "SELECT * FROM consultas WHERE id='$consulta_id'";
                            $query = mysqli_query($conn, $sql);
                        
                            if (mysqli_num_rows($query) > 0) {
                                $consulta = mysqli_fetch_array($query);
                            }
                        }
                        ?>
                        
                        <form action="../controller/ConsultaController.php" method="POST">
                            <input type="hidden" name="usuario_id" value="<?=$consulta['id']?>">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?=$consulta['nome']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" value="<?=$consulta['email']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Data Consulta</label>
                                <input type="date" name="data_consulta" value="<?=$consulta['data_consulta']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Horário</label>
                                <input type="time" name="horario" value="<?=$consulta['horario']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Doutor</label>
                                <input type="text" name="doutor" value="<?=$consulta['doutor']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_consulta" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
