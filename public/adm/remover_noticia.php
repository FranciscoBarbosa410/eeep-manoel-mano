<?php 
    session_start(); // Adicionado para que o $_SESSION funcione corretamente
    include('../../app/banco.php');

    $id = intval($_GET['id']);
    
    $sql_delete = "DELETE FROM noticias WHERE id_noticia = $id";

    if (mysqli_query($conexao, $sql_delete)) {
        $_SESSION['mensagem'] = "Notícia removida com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao remover: " . mysqli_error($conexao);
    }

    header('Location: noticias_adm.php');
    exit();
?>