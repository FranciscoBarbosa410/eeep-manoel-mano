<?php 
    //arquivo temporário
    session_start();
    include('banco.php');

    if(empty($_POST['nome']) || empty($_POST['senha'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
        header('Location: ../public/tela_cadastro.php');
        exit();
    }

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    $sql = "SELECT count(*) as total FROM coordenacao WHERE nome_coordenacao = '$nome'";
    $result = mysqli_query($conexao, $sql);

    $sqlInserir = "INSERT INTO coordenacao(nome_coordenacao, senha_coordenacao) VALUES('$nome', MD5('$senha'))";

    if(mysqli_query($conexao, $sqlInserir)) {
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso! Faça login!";
        header('Location: ../public/index.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar" . mysqli_error($conexao);
        header('Location: ../public/telacadastro.php');
        exit();
    }

?>