<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <form action="../app/login.php" method="post">
        <label for="nome">Nome</label>
        <input id="nome" type="text" name="nome">

        <label for="senha">Senha</label>
        <input id="nome" type="password" name="senha">

        <input type="submit" value="Entrar">
    </form>
</body>
</html>