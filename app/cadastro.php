<?php 
    //arquivo temporário
    session_start();
    include('banco.php');

    if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
        header('Location: ../public/tela_cadastro.php');
        exit();
    }

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    $sql = "SELECT count(*) as total FROM users WHERE user_email = '$email'";
    $result = mysqli_query($conexao, $sql);

    $sqlInserir = "INSERT INTO users(user_name, user_email, user_password) VALUES('$nome', '$email', MD5('$senha'))";

    if(mysqli_query($conexao, $sqlInserir)) {
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso! Faça login!";
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar" . mysqli_error($conexao);
        header('Location: telacadastro.php');
        exit();
    }

?>