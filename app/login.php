<?php 
    session_start();
    include('banco.php');

    if (empty($_POST['nome']) || empty($_POST['senha'])) {
        header('Location: ../public/index.php');
        exit();
    }

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "SELECT id_coordenacao, nome_coordenacao FROM coordenacao WHERE nome_coordenacao = '$nome' AND senha_coordenacao = MD5('$senha')";
    $result = mysqli_query($conexao, $query);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }

    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $_SESSION['nome'] = $nome;
        header('Location: ../public/index_adm.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../public/index.php');
        exit();
    }
?>