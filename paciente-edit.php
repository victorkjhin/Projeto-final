<?php
session_start();
require 'conexao.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar dados</title>
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
                        <h4>Editar dados
                            <a href="index.php" class="btn btn-danger float-end">Retornar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                         if (isset($_GET['id'])) {
                            $paciente_id = mysqli_real_escape_string($conexao, $_GET['id']);
                            $sql = "SELECT * FROM pacientes WHERE ID='$paciente_id'";
                            $query = mysqli_query($conexao, $sql);
                        
                            if (mysqli_num_rows($query) > 0) {
                                $paciente = mysqli_fetch_array($query);
                            }
                        ?>

                    
                    <form action="funcoes.php" method="POST">
                         <input type="hidden" name="paciente_id" value="<?=$paciente['id']?>">
                        
                         <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?=$paciente['nome']?>" class=" form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>CPF</label>
                                <input type="text" name="cpf" value="<?=$paciente['cpf']?>" class="form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>Telefone</label>
                                <input type="text" name="telefone" value="<?=$paciente['telefone']?>" class="form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" value="<?=$paciente['endereco']?>" class="form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" value="<?=$paciente['email']?>" class="form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>Data de nascimento</label>
                                <input type="date" name="data_nascimento" value="<?=$paciente['data_nascimento']?>" class="form-control" required> 
                            </div>
                            <div class="mb-3">
                            <button type="submit" name="update_paciente" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                        <?php
                        } else {
                          echo "<h5>Paciente não encontrado</h5>";


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

