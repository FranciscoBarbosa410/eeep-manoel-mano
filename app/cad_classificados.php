<?php 
    /*
    nome_classificado
    curso_aprovado
    instituicao_aprovada
    foto_classificado
    */

    session_start();
    include('banco.php');

    if(empty($_POST['nome_classificado']) || empty($_POST['curso_aprovado']) || empty($_POST['instituicao_aprovada']) || empty($_FILES['foto_classificado']['tmp_name'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
        header('Location: ../public/cad_classificados.php');
        exit();
    }

    $nome_classificado  = $_POST['nome_classificado'];
    $curso_aprovado = $_POST['curso_aprovado'];
    $instituicao_aprovada = $_POST['instituicao_aprovada'];
    $foto_classificado = addslashes(file_get_contents($_FILES['foto_classificado']['tmp_name']));

    $query = "INSERT INTO classificados (nome_classificado, curso_aprovado, instituicao_aprovada, foto_classificado)
        VALUES  (
        '$nome_classificado',
        '$curso_aprovado',
        '$instituicao_aprovada',
        '$foto_classificado'
        )";

    if(mysqli_query($conexao, $query)) {
        $_SESSION['mensagem'] = "Cadastro do realizado com sucesso!";
        header('Location: ../public/index_adm.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar" . mysqli_error($conexao);
        header('Location: ../public/index_adm.php');
        exit();
    }
    
?>