<?php
require 'conexao.php';

$id = $_POST['id'];

$sql = "UPDATE consultas SET status = 'Concluída' WHERE id = $id";

echo mysqli_query($conexao, $sql) ? "ok" : "erro";
?>
