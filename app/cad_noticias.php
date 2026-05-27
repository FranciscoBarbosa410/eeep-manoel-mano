<?php 
    session_start();
    include('banco.php');

    if(empty($_POST['titulo']) || empty($_POST['data_noticia']) || empty($_POST['descricao_noticia']) || empty($_FILES['foto_noticia']['tmp_name'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
        header('Location: ../public/cad_noticias.php');
        exit();
    }

    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $descricao_noticia = mysqli_real_escape_string($conexao, $_POST['descricao_noticia']);
    
    $data_input = $_POST['data_noticia']; 
    $partes_data = explode('/', $data_input);

    if (count($partes_data) == 3) {
        $data_noticia = $partes_data[2] . '-' . $partes_data[1] . '-' . $partes_data[0];
        $data_noticia = mysqli_real_escape_string($conexao, $data_noticia);
    } else {
        $data_noticia = date('Y-m-d'); 
    }

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
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . mysqli_error($conexao);
        header('Location: ../public/adm/cad_noticias.php');
        exit();
    }
?>