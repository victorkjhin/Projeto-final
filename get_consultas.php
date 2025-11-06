<?php

require 'conexao.php';

$sql = "SELECT c.id, p.nome AS paciente, m.nome AS medico, c.data_consulta, c.hora_consulta, c.motivo_consulta
        FROM consultas c
        JOIN pacientes p ON c.id_paciente = p.id
        JOIN medicos m ON c.id_medico = m.id
        ORDER BY c.data_consulta DESC, c.hora_consulta DESC";

$result = mysqli_query($conexao, $sql);

if (!$result) {
    
    echo "<tr><td colspan='7' class='text-danger'>Erro na consulta: " . mysqli_error($conexao) . "</td></tr>";
    exit;
}

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
   
    $id = (int)$row['id'];
    $paciente = htmlspecialchars($row['paciente'], ENT_QUOTES);
    $medico = htmlspecialchars($row['medico'], ENT_QUOTES);
    $data = htmlspecialchars(date('d/m/Y', strtotime($row['data_consulta'])), ENT_QUOTES);
    $hora = htmlspecialchars($row['hora_consulta'], ENT_QUOTES);
    $motivo = htmlspecialchars($row['motivo_consulta'], ENT_QUOTES);

    echo "<tr>
            <td>{$id}</td>
            <td>{$paciente}</td>
            <td>{$medico}</td>
            <td>{$data}</td>
            <td>{$hora}</td>
            <td>{$motivo}</td>
            <td>
              <form action='consulta-delete.php' method='POST' onsubmit='return confirm(\"Tem certeza que deseja excluir esta consulta?\")' class='d-inline'>
                <input type='hidden' name='id' value='{$id}'>
                <button type='submit' class='btn btn-danger btn-sm'>Excluir</button>
              </form>
            </td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='7' class='text-center'>Nenhuma consulta cadastrada</td></tr>";
}
?>
