<?php 
    session_start();
    include('banco.php');

    if(empty($_POST['nome_profissional']) || empty($_POST['descricao_profissional'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios!";
        header('Location: ../public/adm/tela_cad_profissionais.php');
        exit();
    }

    $nome_profissional = $_POST['nome_profissional'];
    $descricao_profissional = $_POST['descricao_profissional'];

    if(!empty($_FILES['foto_profissional']['tmp_name'])) {
        $foto_profissional = addslashes(file_get_contents($_FILES['foto_profissional']['tmp_name']));
    } else {
        $caminho_padrao = '../public/src/images/default_picture.jpeg'; 

        if(file_exists($caminho_padrao)) {
            $foto_profissional = addslashes(file_get_contents($caminho_padrao));
        } else {
            $_SESSION['mensagem'] = "Erro: Imagem padrão não encontrada no servidor.";
            header('Location: ../public/adm/cad_profissionais.php');
            exit();
        }
    }

    $query = "INSERT INTO profissionais (nome_profissional, descricao_profissional, foto_profissional)
              VALUES ('$nome_profissional', '$descricao_profissional', '$foto_profissional')";

    if(mysqli_query($conexao, $query)) {
        $_SESSION['mensagem'] = "Cadastro do profissional realizado com sucesso!";
        header('Location: ../public/adm/cad_profissionais.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . mysqli_error($conexao);
        header('Location: ../public/adm/cad_profissionais.php');
        exit();
    }
?>