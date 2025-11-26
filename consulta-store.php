<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_paciente = $_POST['id_paciente'];
  $id_medico = $_POST['id_medico'];
  $data_consulta = $_POST['data_consulta'];
  $hora_consulta = $_POST['hora_consulta'];
  $motivo_consulta = $_POST['motivo_consulta'];
  $status = $_POST['status'];
  
  
  $sql = "INSERT INTO consultas 
  (id_paciente, id_medico, data_consulta, hora_consulta, motivo_consulta)
  VALUES ('$id_paciente', '$id_medico', '$data_consulta', '$hora_consulta', '$motivo_consulta')";


  if (mysqli_query($conexao, $sql)) {
    header("Location: consultas.php");
    exit;
  } else {
    echo "Erro ao salvar consulta: " . mysqli_error($conexao);
  }
}
?>
