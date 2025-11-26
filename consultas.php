<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Consultas Agendadas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    
    table#tabela-consultas thead tr {
      background-color: white !important;
      color: black !important;
    }

    .titulo-container {
      position: relative;
      text-align: center;
      width: 100%;
    }

    .titulo-container h2 {
      margin: 0;
    }

    .titulo-container a {
      position: absolute;
      right: 0;
      top: 0;
    }
  </style>
</head>
<body class="bg-light">

  <?php include('navbar.php'); ?>

  <div class="container mt-5">
    <div class="titulo-container mb-3">
      <h2>Consultas Agendadas</h2>
      <a href="consulta-create.php" class="btn btn-primary">Marcar nova consulta</a>
    </div>

    <table class="table table-striped table-bordered shadow-sm" id="tabela-consultas">
      <thead>
        <tr>
          <th>Paciente</th>
          <th>Médico</th>
          <th>Data</th>
          <th>Hora</th>
          <th>Motivo</th>
          <th>Status</th> 
          <th>Ações</th> 
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>

  <script>
   
    function carregarConsultas() {
      fetch('get_consultas.php')
        .then(res => res.text())
        .then(html => {
          document.querySelector('#tabela-consultas tbody').innerHTML = html;
        })
        .catch(err => console.error('Erro ao buscar consultas:', err));
    }

    
    function concluirConsulta(id) {
      if (!confirm("Marcar consulta como concluída?")) return;

      fetch('concluir_consulta.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: 'id=' + id
      })
      .then(r => r.text())
      .then(r => {
          if (r === "ok") {
              carregarConsultas();
          } else {
              alert("Erro ao concluir consulta.");
          }
      });
    }

    
    function cancelarConsulta(id) {
      if (!confirm("Deseja cancelar esta consulta?")) return;

      fetch('cancelar_consulta.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: 'id=' + id
      })
      .then(r => r.text())
      .then(r => {
          if (r === "ok") {
              carregarConsultas();
          } else {
              alert("Erro ao cancelar consulta.");
          }
      });
    }

    
carregarConsultas();
    setInterval(carregarConsultas, 3000);
  </script>

  <script>
    function concluirConsulta(id) {
        fetch("concluir_consulta.php", {
            method: "POST",
            body: new URLSearchParams({ id })
        })
        .then(res => res.text())
        .then(data => {
            console.log("Retorno do servidor:", data);
            if (data.trim() === "OK") {
                alert("Consulta concluída!");
                carregarConsultas();
            } else {
                alert("Consulta concluída!");
            }
        })
        .catch(err => console.error("Erro:", err));
    }

    function cancelarConsulta(id) {
        fetch("cancelar_consulta.php", {
            method: "POST",
            body: new URLSearchParams({ id })
        })
        .then(res => res.text())
        .then(data => {
            console.log("Retorno do servidor:", data);
            if (data.trim() === "OK") {
                alert("Consulta cancelada!");
                carregarConsultas();
            } else {
                alert("Erro no servidor: " + data);
            }
        })
        .catch(err => console.error("Erro:", err));
    }
</script>

</body>
</html>
