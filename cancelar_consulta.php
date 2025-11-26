<?php
require 'conexao.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "UPDATE consultas SET status = 'Cancelada' WHERE id = $id";

    if (mysqli_query($conexao, $sql)) {
        echo "OK";  
    } else {
        echo "ERRO: " . mysqli_error($conexao);
    }
}
