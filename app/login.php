<?php 
    session_start();
    include('banco.php');

    if (empty($_POST['email']) || empty($_POST['senha'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
        header('Location: ../public/tela_login.php');
        exit();
    }

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "SELECT id_coordenacao, email_coordenacao FROM coordenacao WHERE email_coordenacao = '$email' AND senha_coordenacao = MD5('$senha')";
    $result = mysqli_query($conexao, $query);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }

    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $_SESSION['email'] = $email;
        header('Location: ../public/adm/index_adm.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        $_SESSION['mensagem'] = "Usuário não autenticado ou incorreto!";
        header('Location: ../public/tela_login.php');
        exit();
    }
?>