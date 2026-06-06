<?php 
    session_start();
    include('banco.php');

    if(empty($_POST['nome_classificado']) || empty($_POST['curso_aprovado']) || empty($_POST['instituicao_aprovada'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios!";
        header('Location: ../public/adm/cad_classificados.php');
        exit();
    }

    // Escapa as strings para evitar quebras por aspas ou caracteres especiais
    $nome_classificado = mysqli_real_escape_string($conexao, $_POST['nome_classificado']);
    $curso_aprovado = mysqli_real_escape_string($conexao, $_POST['curso_aprovado']);
    $instituicao_aprovada = mysqli_real_escape_string($conexao, $_POST['instituicao_aprovada']);

    // Lógica da imagem: Se enviado salva, senão utiliza a foto default
    if(!empty($_FILES['foto_classificado']['tmp_name'])) {
        $foto_classificado = addslashes(file_get_contents($_FILES['foto_classificado']['tmp_name']));
    } else {
        $caminho_padrao = '../public/src/images/default_picture.jpeg'; 

        if(file_exists($caminho_padrao)) {
            $foto_classificado = addslashes(file_get_contents($caminho_padrao));
        } else {
            $_SESSION['mensagem'] = "Erro: Imagem padrão não encontrada no servidor.";
            header('Location: ../public/adm/cad_classificados.php');
            exit();
        }
    }

    $query = "INSERT INTO classificados (nome_classificado, curso_aprovado, instituicao_aprovada, foto_classificado)
              VALUES ('$nome_classificado', '$curso_aprovado', '$instituicao_aprovada', '$foto_classificado')";

    if(mysqli_query($conexao, $query)) {
        $_SESSION['mensagem'] = "Cadastro do classificado realizado com sucesso!";
        header('Location: ../public/adm/cad_classificados.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . mysqli_error($conexao);
        header('Location: ../public/adm/cad_classificados.php');
        exit();
    }
?>