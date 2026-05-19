<?php 
    session_start();
    include('banco.php');

    if(empty($_POST['titulo']) || empty($_POST['data_noticia']) || empty($_POST['descricao_noticia']) || empty($_FILES['foto_noticia']['tmp_name'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
        header('Location: ../public/cad_noticias.php');
        exit();
    }

    $titulo = $_POST['titulo'];
    $data_noticia = $_POST['data_noticia'];
    $descricao_noticia = $_POST['descricao_noticia'];
    $foto_noticia = addslashes(file_get_contents($_FILES['foto_noticia']['tmp_name']));

    $query = "INSERT INTO noticias (titulo, data_noticia, descricao_noticia, foto_noticia)
        VALUES  (
        '$titulo',
        '$data_noticia',
        '$descricao_noticia',
        '$foto_noticia'
        )";

    if(mysqli_query($conexao, $query)) {
        $_SESSION['mensagem'] = "Cadastro da notícia realizado com sucesso!";
        header('Location: ../public/adm/cad_noticias.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar" . mysqli_error($conexao);
        header('Location: ../public/adm/cad_noticias.php');
        exit();
    }
    
?>