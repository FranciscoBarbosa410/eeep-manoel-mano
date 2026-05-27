<?php 
    session_start();
    include('navbar_adm.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Profissional</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <div class="card">
        <div class="card-cad">
            <h1 class="titulo">Cadastrar</h1>
            <p class="sub">Profissional</p>
            <?php
                if(isset($_SESSION['mensagem'])) {
                    echo "<p>" . $_SESSION['mensagem'] . "</p>";
                    unset($_SESSION['mensagem']); 
                }
            ?>

            <form action="../../app/cad_profissionais.php" method="post" enctype="multipart/form-data">
                <div class="text">
                    <label for="nome_profissional">Nome:</label>
                    <input type="text" name="nome_profissional" id="nome_profissional" required>

                    <label for="descricao_profissional">Descrição:</label>
                    <input type="text" name="descricao_profissional" id="descricao_profissional" required>

                    <label for="foto_profissional">Foto do profissional(Opcional - Somente .jpeg):</label><br>
                    <input type="file" name="foto_profissional" id="foto_profissional" accept="image/*"><br><br>                    
                </div>

                <button class="btn-primary" type="submit">Cadastrar Profissional</button>
            </form>    
            <a href="profissionais_adm.php" class="btn-cad">Voltar</a>
        </div>
    </div>
</body>
</html>