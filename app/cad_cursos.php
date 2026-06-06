<?php 
    session_start();
    include('banco.php');

    if(empty($_POST['nome_curso']) || empty($_POST['descricao_curso']) || empty($_FILES['foto_curso']['tmp_name'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios!";
        header('Location: ../public/adm/cad_cursos.php');
        exit();
    }

    $nome_curso = mysqli_real_escape_string($conexao, $_POST['nome_curso']);
    $descricao_curso = mysqli_real_escape_string($conexao, $_POST['descricao_curso']);

    $foto_curso = addslashes(file_get_contents($_FILES['foto_curso']['tmp_name']));

    $query = "INSERT INTO curso (nome_curso, descricao_curso, foto_curso)
              VALUES ('$nome_curso', '$descricao_curso', '$foto_curso')";

    if(mysqli_query($conexao, $query)) {
        $_SESSION['mensagem'] = "Cadastro do curso realizado com sucesso!";
        header('Location: ../public/adm/cad_cursos.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . mysqli_error($conexao);
        header('Location: ../public/adm/cad_cursos.php');
        exit();
    }
?>