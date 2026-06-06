<?php 
    session_start();
    include('navbar_adm.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Administrador</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <div class="card">
        <div class="card-cad">
            <h1 class="titulo">Cadastrar</h1>
            <p class="sub">Administrador</p>
            
            <?php
                if(isset($_SESSION['mensagem'])) {
                    echo "<p class='alert-mensagem'>" . $_SESSION['mensagem'] . "</p>";
                    unset($_SESSION['mensagem']); 
                }
            ?>

            <form action="../../app/cad_admins.php" method="post">
                <div class="text">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" required>

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>

                    <label for="confirmar_senha">Confirmar Senha:</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar senha" required>
                </div>

                <button class="btn-primary" type="submit">Cadastrar Administrador</button>
            </form>    
            <a href="admins.php" class="btn-cad">Voltar</a>
        </div>
    </div>
</body>
</html>