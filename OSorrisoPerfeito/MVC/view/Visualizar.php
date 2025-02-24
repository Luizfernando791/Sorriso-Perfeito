<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include('../model/NavBar.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visualizar Cliente
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
                            } else {
                                exit();
                            }
                        }
                        ?>
                        <?php if (isset($consulta)): ?>
                            <div class="mb-3">
                                <label>Nome</label>
                                <p class="form-control">
                                    <?=$consulta['nome'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <p class="form-control">
                                    <?=$consulta['email'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Data Consulta</label>
                                <p class="form-control">
                                    <?=date('d/m/Y', strtotime($consulta['data_consulta']));?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Horário</label>
                                <p class="form-control">
                                    <?=$consulta['horario'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Doutor</label>
                                <p class="form-control">
                                    <?=$consulta['doutor'];?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
