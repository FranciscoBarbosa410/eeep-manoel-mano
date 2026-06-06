<?php 
    session_start();
    include('../../app/banco.php');

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        
        $query = "DELETE FROM classificados WHERE id_classificado = $id";

        if (mysqli_query($conexao, $query)) {
            $_SESSION['mensagem'] = "Classificado removido com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao remover classificado: " . mysqli_error($conexao);
        }
    } else {
        $_SESSION['mensagem'] = "ID inválido para remoção.";
    }

    header('Location: index_adm.php');
    exit();
?>