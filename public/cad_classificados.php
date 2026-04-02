<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Classificados</title>
</head>
<body>
    <h1>Cadastrar Classificado</h1>
    <form action="../app/cad_classificados.php" method="post" enctype="multipart/form-data">
        <label for="nome_classificado">Nome Completo</label>
        <input type="text" name="nome_classificado" id="nome_classificado" maxlength="255" required>

        <label for="curso_aprovado">Curso:</label>
        <input type="text" name="curso_aprovado" id="curso_aprovado" required>
        
        <label for="instituicao_aprovada">Instituição:</label>
        <input type="text" name="instituicao_aprovada" id="instituicao_aprovada" maxlength="255" required>

        <label for="foto_classificado">Foto do(a) Classificado(a):</label>
        <input type="file" name="foto_classificado" id="foto_classificado" accept="image/*"><br><br>

        <input type="submit" value="Cadastrar Aluno">
    </form>

    <a href="index_adm.php">Voltar</a>
</body>
</html>