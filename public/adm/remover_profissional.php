<?php 
    session_start();
    include('../../app/banco.php');

    if (!isset($_GET['id'])) {
        $_SESSION['mensagem'] = "Profissional não informado!";
        header('Location: profissionais_adm.php');
        exit();
    }

    $id = intval($_GET['id']);
    
    $sql_delete = "DELETE FROM profissionais WHERE id_profissional = $id";

    if (mysqli_query($conexao, $sql_delete)) {
        $_SESSION['mensagem'] = "Profissional removido com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao remover profissional: " . mysqli_error($conexao);
    }

    header('Location: profissionais_adm.php');
    exit();
?>