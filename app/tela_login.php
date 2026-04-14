<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./src/css/login.css">
</head>
<body>
    <div class="master">
        <div class="esquerda-tela">
            <h1 class="titulo">Bem vindo a tela login!</h1>
            <p>
                Ficamos felizes por ter você aqui. Se você tem acesso,
                preencha os campos para gerenciamento.
            </p>
        </div>

        <div class="direita-tela">
            <div class="card-login">
                <h1 class="titulo">Login</h1>
                <p class="sub">de administrador</p>

                <form action="../app/login.php" method="post">    
                    <div class="text">
                        <label for="nome">Nome</label>
                        <input id="nome" type="text" name="nome" required>
                    </div>

                    <div class="text">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" required>
                    </div>

                    <button type="submit" class="btn-login">Login</button>
                </form> 
            </div>
        </div>
    </div>
</body>
</html>