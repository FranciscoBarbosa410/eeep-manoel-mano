<?php 
    session_start();
    include('../../app/banco.php');

    if (!isset($_GET['id'])) {
        $_SESSION['mensagem'] = "Administrador não informado!";
        header('Location: admins.php');
        exit();
    }

    $id = intval($_GET['id']);
    
    $sql_delete = "DELETE FROM coordenacao WHERE id_coordenacao = $id";

    if (mysqli_query($conexao, $sql_delete)) {
        $_SESSION['mensagem'] = "Administrador removido com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao remover: " . mysqli_error($conexao);
    }

    header('Location: admins.php');
    exit();
?>