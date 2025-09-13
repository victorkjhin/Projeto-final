<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de pacientes</title>
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
                        <h4>Dados do paciente
                            <a href="index.php" class="btn btn-danger float-end">Retornar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="funcoes.php" method="POST">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>CPF</label>
                                <input type="text" name="cpf" class="form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>Telefone</label>
                                <input type="text" name="telefone" class="form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" class="form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                        <div class="mb-3">
                                <label>Data de nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control" required> 
                            </div>
                            <div class="mb-3">
                            <button type="submit" name="create_paciente" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
                    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>

