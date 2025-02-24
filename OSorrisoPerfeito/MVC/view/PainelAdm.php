<?php
session_start();
require '../model/Database.php';

$database = new Database();
$conn = $database->getConnection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>SorrisoPerfeito</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include('../model/NavBar.php'); ?>
    
    <div class="container mt-4">

        <?php include('../model/Mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h4> Consultas e Horários
                            <a href="AdicionarConsulta.php" class="btn btn-primary float-end">Adicionar Consulta</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Data Consulta</th>
                                    <th>Horário</th>
                                    <th>Doutor</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM consultas';
                                $consultas = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($consultas) > 0) {
                                    foreach($consultas as $consulta) {
                                ?>
                                
                                <tr>
                                    <td><?=$consulta['id']?></td>
                                    <td><?=$consulta['nome']?></td>
                                    <td><?=$consulta['email']?></td>
                                    <td><?=date('d/m/Y', strtotime($consulta['data_consulta']))?></td>
                                    <td><?=$consulta['horario']?></td>
                                    <td><?=$consulta['doutor']?></td>
                                    <td>
                                        <a href="Visualizar.php?id=<?=$consulta['id']?>" class="btn btn-secondary btn sm"> <span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                                        <a href="Editar.php?id=<?=$consulta['id']?>" class="btn btn-success btn sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                                        <form action="../model/Consulta.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_consulta" value="<?=$consulta['id']?>" class="btn btn-danger btn-bi"><span class="bi-trash-fill"></span>&nbsp;Excluir</button>
                                        </form>
                                    </td>
                                </tr>

                                <?php
                                    }
                                } else {
                                    echo '<h5> Nenhum usuário encontrado </h5>';
                                }
                                ?>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>