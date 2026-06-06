<?php 
    session_start();
    include('navbar_adm.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Curso</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <div class="card">
        <div class="card-cad">
            <h1 class="titulo">Cadastrar</h1>
            <p class="sub">Curso</p>
            
            <?php
                if(isset($_SESSION['mensagem'])) {
                    echo "<p class='alert-mensagem'>" . $_SESSION['mensagem'] . "</p>";
                    unset($_SESSION['mensagem']); 
                }
            ?>

            <form action="../../app/cad_cursos.php" method="post" enctype="multipart/form-data">
                <div class="text">
                    <label for="nome_curso">Nome do Curso:</label>
                    <input type="text" name="nome_curso" id="nome_curso" placeholder="Nome do Curso" required>

                    <label for="descricao_curso">Descrição:</label>
                    <textarea name="descricao_curso" id="descricao_curso" rows="6" cols="50" placeholder="Descrição do Curso" required></textarea>

                    <label for="foto_curso">Foto do curso (Somente .jpeg):</label><br>
                    <input type="file" name="foto_curso" id="foto_curso" accept="image/*" required><br><br>                    
                </div>

                <button class="btn-primary" type="submit">Cadastrar Curso</button>
            </form>    
            
            <a href="cursos_adm.php" class="btn-cad">Voltar</a>
        </div>
    </div>
</body>
</html>