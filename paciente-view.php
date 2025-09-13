<?php
require 'conexao.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informações do paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Informações do paciente
                            <a href="index.php" class="btn btn-danger float-end">Retornar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])){
                            $pacientes_id = mysqli_real_escape_string($conexao, $_GET['id']);
                            $sql = "SELECT * FROM pacientes WHERE id = '$pacientes_id'";
                            $query = mysqli_query($conexao, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                $pacientes = mysqli_fetch_array($query);
                            ?>   
                        
                        <div class="mb-3">
                                <label>Nome</label>
                                <p class="form-control">
                                <?=$pacientes['nome'];?>
                            </p>
                            </div>
                        
                        <div class="mb-3">
                                <label>CPF</label>
                                <p class="form-control">
                                <?=$pacientes['cpf'];?>
                            </p>
                            </div>
                        
                        <div class="mb-3">
                                <label>Telefone</label>
                                <p class="form-control">
                                <?=$pacientes['telefone'];?>
                            </p>
                            </div>
                        
                        <div class="mb-3">
                                <label>Endereço</label>
                                <p class="form-control">
                                <?=$pacientes['endereco'];?>
                            </p>
                            </div>

                        <div class="mb-3">
                                <label>Email</label>
                                <p class="form-control">
                                <?=$pacientes['email'];?>
                            </p>
                            </div>

                         <div class="mb-3">
                                <label>Data de nascimento</label>
                                <p class="form-control">
                                <?=date('d/m/Y', strtotime($pacientes['data_nascimento']));?>
                            </p>
                            </div>
                        <?php
                        
                    } else {
                            echo "<h5>Paciente não encontrado</h5>";
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>