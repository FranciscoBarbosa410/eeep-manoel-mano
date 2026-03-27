<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Notícias</title>
</head>
<body>
    <h1>Cadastrar Notícia</h1>
    <form action="../app/cad_noticias.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" maxlength="100" required>

        <label for="data_noticia">Data da notícia:</label>
        <input type="date" name="data_noticia" id="data_noticia" required>
        
        <label for="conteudo">Conteúdo:</label><br>
        <textarea name="conteudo" id="conteudo" rows="6" cols="50" required></textarea>

        <label for="foto_noticia">Foto da notícia:</label><br>
        <input type="file" name="foto_noticia" id="foto_noticia" accept="image/*"><br><br>

        <input type="submit" value="Cadastrar Notícia">
    </form>

    <a href="index_adm.php">Voltar</a>
</body>
</html>