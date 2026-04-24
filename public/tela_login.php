<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <main class="container">
        <!-- LADO ESQUERDO -->
        <section class="tela-esquerda">
            <h1 class="titulo">Bem vindo a tela login!</h1>
            <p>
                Ficamos felizes por ter você aqui. Se você tem acesso,
                preencha os campos para gerenciamento.
            </p>
        </section>
        <!-- LADO DIREITO -->
        <section class="tela-direita">
            <a href="index.php" class="btn-back">Voltar</a>
            <div class="card-login">
                <h1 class="titulo">Login</h1>
                <p class="sub">De administrador</p>
                <?php 
                    session_start();
                    if(isset($_SESSION['mensagem'])) {
                        echo "<p>" . $_SESSION['mensagem'] . "</p>";
                        unset($_SESSION['mensagem']); 
                    }
                ?>
                <form action="../app/login.php" method="post">    
                    
                    <div class="text">
                        <label for="nome">Nome</label>
                        <input id="nome" type="text" name="nome" required>
                    
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" required>
                    </div>

                    <button class="btn-login" type="submit">Login</button>
                </form> 
            </div>
        </section>
    </main>
</body>
</html>