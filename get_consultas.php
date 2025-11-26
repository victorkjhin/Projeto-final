<?php
require 'conexao.php';

$sql = "SELECT c.*, 
               p.nome AS paciente,
               m.nome AS medico
        FROM consultas c
        JOIN pacientes p ON c.id_paciente = p.id
        JOIN medicos m ON c.id_medico = m.id
        ORDER BY c.data_consulta ASC, c.hora_consulta ASC";

$result = mysqli_query($conexao, $sql);

while ($c = mysqli_fetch_assoc($result)) {

    
    if ($c['status'] == "Pendente") {

        $statusBadge = '<span class="badge bg-warning text-dark">Pendente</span>';

        $acoes = '
            <button class="btn btn-success btn-sm" onclick="concluirConsulta('.$c['id'].')">Concluir</button>
            <button class="btn btn-danger btn-sm" onclick="cancelarConsulta('.$c['id'].')">Cancelar</button>
        ';

    } elseif ($c['status'] == "Concluída") {

        $statusBadge = '<span class="badge bg-success">Concluída</span>';
        $acoes = '-';

    } else {

        
        $statusBadge = '<span class="badge bg-secondary">'.$c['status'].'</span>';
        $acoes = '-';
    }

    echo "
    <tr>
      <td>{$c['paciente']}</td>
      <td>{$c['medico']}</td>
      <td>{$c['data_consulta']}</td>
      <td>{$c['hora_consulta']}</td>
      <td>{$c['motivo_consulta']}</td>
      <td>{$statusBadge}</td>
      <td>{$acoes}</td>
    </tr>";
}
?>
