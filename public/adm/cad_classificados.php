<?php 
    session_start();
    include('navbar_adm.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Classificado</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <div class="card">
        <div class="card-cad">
            <h1 class="titulo">Cadastrar</h1>
            <p class="sub">Classificado</p>
            <?php
                if(isset($_SESSION['mensagem'])) {
                    echo "<p class='alert-mensagem' style='text-align:center; color: var(--color-primary-1); font-weight:bold;'>" . $_SESSION['mensagem'] . "</p>";
                    unset($_SESSION['mensagem']); 
                }
            ?>

            <form action="../../app/cad_classificados.php" method="post" enctype="multipart/form-data">
                <div class="text">
                    <label for="nome_classificado">Nome Completo:</label>
                    <input type="text" name="nome_classificado" id="nome_classificado" maxlength="255" placeholder="Nome" required>

                    <label for="curso_aprovado">Curso:</label>
                    <input type="text" name="curso_aprovado" id="curso_aprovado" placeholder="Curso" required>
                    
                    <label for="instituicao_aprovada">Instituição:</label>
                    <input type="text" name="instituicao_aprovada" id="instituicao_aprovada" maxlength="255" placeholder="Ex: UFC" required>

                    <label for="foto_classificado">Foto do(a) Classificado(a) (Opcional - Somente .jpeg):</label><br>
                    <input type="file" name="foto_classificado" id="foto_classificado" accept="image/*"><br><br>                    
                </div>

                <button class="btn-primary" type="submit">Cadastrar Aluno</button>
            </form>    
            <a href="index_adm.php" class="btn-cad">Voltar</a>
        </div>
    </div>
</body>
</html>