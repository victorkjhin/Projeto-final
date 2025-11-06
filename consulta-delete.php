<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Método inválido.";
    exit;
}

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo "ID inválido.";
    exit;
}

$id = (int) $_POST['id'];


$stmt = mysqli_prepare($conexao, "DELETE FROM consultas WHERE id = ?");
if (!$stmt) {
    echo "Erro ao preparar operação: " . mysqli_error($conexao);
    exit;
}

mysqli_stmt_bind_param($stmt, 'i', $id);
$exec = mysqli_stmt_execute($stmt);

if ($exec) {
    mysqli_stmt_close($stmt);
   
    header("Location: consultas.php");
    exit;
} else {
    $err = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    echo "Erro ao excluir: " . $err;
    exit;
}
?>
