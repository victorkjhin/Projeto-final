<?php
session_start();
require 'conexao.php';


if(isset($_POST['create_paciente'])){
    $nome = mysqli_real_escape_string($conexao, trim ($_POST['nome']));
    $cpf = mysqli_real_escape_string($conexao, trim ($_POST['cpf']));
    $telefone = mysqli_real_escape_string($conexao, trim ($_POST['telefone']));
    $endereco = mysqli_real_escape_string($conexao, trim ($_POST['endereco']));
    $email = mysqli_real_escape_string($conexao, trim ($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim ($_POST['data_nascimento']));

    $sql = "INSERT INTO pacientes (nome, cpf, telefone, endereco, email, data_nascimento) VALUES ('$nome', '$cpf', '$telefone', '$endereco', '$email', '$data_nascimento')";

    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0 ) {
        $_SESSION['mensagem'] = ' Paciente adicionado com sucesso';
        header('Location: index.php');
        exit;
    }
}

if(isset($_POST['create_medico'])){
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $crm = mysqli_real_escape_string($conexao, trim($_POST['crm']));
    $especialidade = mysqli_real_escape_string($conexao, trim($_POST['especialidade']));
    $contato = mysqli_real_escape_string($conexao, trim($_POST['contato']));

    $sql = "INSERT INTO medicos (nome, crm, especialidade, contato) VALUES ('$nome', '$crm', '$especialidade', '$contato')";
    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Médico adicionado com sucesso';
        header('Location: index.php');
        exit;
    }
}


if(isset($_POST['update_paciente'])){
    $paciente_id = mysqli_real_escape_string($conexao, $_POST['paciente_id']);
    
    $nome = mysqli_real_escape_string($conexao, trim ($_POST['nome']));
    $cpf = mysqli_real_escape_string($conexao, trim ($_POST['cpf']));
    $telefone = mysqli_real_escape_string($conexao, trim ($_POST['telefone']));
    $endereco = mysqli_real_escape_string($conexao, trim ($_POST['endereco']));
    $email = mysqli_real_escape_string($conexao, trim ($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim ($_POST['data_nascimento']));

    $sql = "UPDATE pacientes SET nome = '$nome', cpf ='$cpf', telefone ='$telefone', endereco ='$endereco', email ='$email', data_nascimento ='$data_nascimento'";

    $sql .= " WHERE id= '$paciente_id'";
    
    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0 ) {
        $_SESSION['mensagem'] = ' Paciente atualizado com sucesso';
        header('Location: index.php');
        exit;
    }
}


if(isset($_POST['update_medico'])){
    $medico_id = mysqli_real_escape_string($conexao, $_POST['medico_id']);
    
    $nome = mysqli_real_escape_string($conexao, trim ($_POST['nome']));
    $crm = mysqli_real_escape_string($conexao, trim ($_POST['crm']));
    $especialidade = mysqli_real_escape_string($conexao, trim ($_POST['especialidade']));
    $contato = mysqli_real_escape_string($conexao, trim ($_POST['contato']));
    

    $sql = "UPDATE medicos SET nome = '$nome', crm ='$crm', especialidade ='$especialidade', contato ='$contato'";

    $sql .= " WHERE id= '$medico_id'";
    
    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0 ) {
        $_SESSION['mensagem'] = ' Médico atualizado com sucesso';
        header('Location: index.php');
        exit;
    }
}



if(isset($_POST['delete_paciente'])){
    $paciente_id = mysqli_real_escape_string($conexao, $_POST['delete_paciente']);
    
    $sql ="DELETE FROM pacientes WHERE id = '$paciente_id'";

    mysqli_query($conexao, $sql);
    
    if(mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = 'Paciente excluído com sucesso';
        header('Location: index.php');
        exit;

    }
}

if(isset($_POST['delete_medico'])){
    $medico_id = mysqli_real_escape_string($conexao, $_POST['delete_medico']);
    
    $sql ="DELETE FROM medicos WHERE id = '$medico_id'";

    mysqli_query($conexao, $sql);
    
    if(mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = 'Médico excluído com sucesso';
        header('Location: index.php');
        exit;

    }
}



?>