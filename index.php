<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle cadastral</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php include('navbar.php');?>
    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
    <div class="row">
        <div class="col-md-12">

         
          <div class="card mb-4">
            <div class="card-header">
              <h4>Pacientes
               <a href="paciente-create.php" class="btn btn-primary float-end">Adicionar paciente</a>
              </h4>
            </div>
            <div class="card-body">
               <table class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Email</th>
                    <th>Data de nascimento</th>
                    </tr>
                 </thead>
                 <tbody>
                  <?php
                  $sql = 'SELECT * FROM pacientes';
                  $pacientes = mysqli_query($conexao, $sql);
                  if (mysqli_num_rows($pacientes) > 0) {
                    foreach($pacientes as $paciente) {
                  ?>
                  <tr>
                    <td><?=$paciente['id']?></td>
                    <td><?=$paciente['nome']?></td>  
                    <td><?=$paciente['cpf']?></td>
                    <td><?=$paciente['telefone']?></td>
                    <td><?=$paciente['endereco']?></td>
                    <td><?=$paciente['email']?></td>
                    <td><?=date('d/m/Y', strtotime($paciente['data_nascimento']))?></td>
                    <td>
                      <a href="paciente-view.php?id=<?=$paciente['id']?>" class="btn btn-secondary btn-sm">Visualizar</a>
                      <a href="paciente-edit.php?id=<?=$paciente['id']?>" class="btn btn-success btn-sm">Editar</a>
                      <form action="funcoes.php" method="post" class="d-inline">
                        <button onclick="return confirm('Tem certeza?')" type="submit" name="delete_paciente" value="<?=$paciente['id']?>" class="btn btn-danger btn-sm">
                          Deletar
                        </button>
                      </form>
                    </td> 
                  </tr>
                  <?php
                    }
                  } else {
                    echo '<tr><td colspan="8" class="text-center">Nenhum paciente cadastrado</td></tr>';
                  }
                  ?>
                 </tbody>
               </table>
            </div>
          </div>

          
          <div class="card">
            <div class="card-header">
              <h4>Médicos
                <a href="medico-create.php" class="btn btn-primary float-end">Adicionar médico</a>
              </h4>
            </div>
            <div class="card-body">
               <table class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CRM</th>
                    <th>Especialidade</th>
                    <th>Contato</th>
                  </tr>
                 </thead>
                 <tbody>
                  <?php
                  $sql_med = 'SELECT * FROM medicos';
                  $medicos = mysqli_query($conexao, $sql_med);
                  if (mysqli_num_rows($medicos) > 0) {
                    foreach($medicos as $medico) {
                  ?>
                  <tr>
                    <td><?=$medico['id']?></td>
                    <td><?=$medico['nome']?></td>
                    <td><?=$medico['crm']?></td>
                    <td><?=$medico['especialidade']?></td>
                    <td><?=$medico['contato']?></td>
                    <td>
                      <a href="medico-edit.php?id=<?=$medico['id']?>" class="btn btn-success btn-sm">Editar</a>
                      <form action="funcoes.php" method="post" class="d-inline">
                      <button onclick="return confirm('Tem certeza?')" type="submit" name="delete_medico" value="<?=$medico['id']?>" class="btn btn-danger btn-sm">
                          Deletar
                        </button>
                        </form>
                      </td>
                    </tr>
                  <?php
                    
                  }
                  } else {
                    echo '<tr><td colspan="5" class="text-center">Nenhum médico cadastrado</td></tr>';
                  }
                  ?>
                 </tbody>
               </table>
            </div>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
