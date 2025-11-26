<?php
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Marcar Consulta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
   
    .navbar-purple {
      background-color: #059bf2ff;
    }

    
    .btn-navbar {
      background-color: #0d6efd; 
      border: none;
      color: white;
      font-size: 0.9rem;
      padding: 6px 14px;
    }

    .btn-navbar:hover {
      background-color: #0b5ed7;
      color: white;
    }

    .btn-sm {
      font-size: 0.9rem;
      padding: 6px 14px;
    }

   
    body {
      background-image: url('./Ibagens/maos-de-medico.jpg'); 
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

  
    .card {
      background-color: rgba(255, 255, 255, 0.92); 
      border: none;
      border-radius: 10px;
    }

    h2 {
      color: #333;
    }
  </style>
</head>
<body>


<nav class="navbar navbar-purple">
  <div class="container-md d-flex justify-content-between align-items-center">
    <a class="navbar-brand mx-auto text-white" href="index.php">Unidade Médica</a>
    <a href="consultas.php" class="btn btn-light btn-sm">Consultas</a>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="mb-4 text-center">Marcar nova consulta</h2>

  <form action="consulta-store.php" method="POST" class="card p-4 shadow-sm">
    <div class="mb-3">
      <label for="id_paciente" class="form-label">Paciente</label>
      <select name="id_paciente" id="id_paciente" class="form-select" required>
        <option value="">Selecione um paciente</option>
        <?php
        $pacientes = mysqli_query($conexao, "SELECT id, nome FROM pacientes ORDER BY nome");
        while ($p = mysqli_fetch_assoc($pacientes)) {
          echo "<option value='{$p['id']}'>{$p['nome']}</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="id_medico" class="form-label">Médico</label>
      <select name="id_medico" id="id_medico" class="form-select" required>
        <option value="">Selecione um médico</option>
        <?php
        $medicos = mysqli_query($conexao, "SELECT id, nome, especialidade FROM medicos ORDER BY nome");
        while ($m = mysqli_fetch_assoc($medicos)) {
          echo "<option value='{$m['id']}'>{$m['nome']} ({$m['especialidade']})</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="data_consulta" class="form-label">Data</label>
      <input type="date" name="data_consulta" id="data_consulta" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="hora_consulta" class="form-label">Hora</label>
      <input type="text" name="hora_consulta" id="hora_consulta" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="motivo_consulta" class="form-label">Motivo</label>
      <textarea name="motivo_consulta" id="motivo_consulta" class="form-control" rows="3" required></textarea>
    </div>

    <div class="d-flex justify-content-end gap-2">
      <button type="submit" class="btn btn-navbar btn-sm">Salvar consulta</button>
      <a href="consultas.php" class="btn btn-secondary btn-sm">Voltar</a>
    </div>
  </form>
</div>

</body>
</html>
