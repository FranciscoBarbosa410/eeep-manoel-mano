<?php 
    session_start();
    include('banco.php');

    if(empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['confirmar_senha'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
        header('Location: ../public/adm/cad_admins.php');
        exit();
    }

    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
    $confirmar_senha = mysqli_real_escape_string($conexao, trim($_POST['confirmar_senha']));

    if($senha !== $confirmar_senha) {
        $_SESSION['mensagem'] = "As senhas não coincidem!";
        header('Location: ../public/adm/cad_admins.php');
        exit();
    }

    $sql = "SELECT count(*) as total FROM coordenacao WHERE email_coordenacao = '$email'";
    $result = mysqli_query($conexao, $sql);

    $sqlInserir = "INSERT INTO coordenacao(email_coordenacao, senha_coordenacao) VALUES('$email', MD5('$senha'))";

    if(mysqli_query($conexao, $sqlInserir)) {
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso! Faça login!";
        header('Location: ../public/adm/cad_admins.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . mysqli_error($conexao);
        header('Location: ../public/adm/cad_admins.php');
        exit();
    }
?>