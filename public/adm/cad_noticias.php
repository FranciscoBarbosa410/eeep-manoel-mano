<?php 
    session_start();
    include('navbar_adm.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Notícia</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <div class="card">
        <div class="card-cad">
            <h1 class="titulo">Cadastrar</h1>
            <p class="sub">Notícia</p>
            <?php 
                if(isset($_SESSION['mensagem'])) {
                    echo "<p>" . $_SESSION['mensagem'] . "</p>";
                    unset($_SESSION['mensagem']); 
                }
            ?>
            <form action="../../app/cad_noticias.php" method="post" enctype="multipart/form-data">
                <div class="text">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" maxlength="100" placeholder="Título da notícia" required>
    
                    <label for="data_noticia">Data da notícia (dd/mm/aaaa):</label>
                    <input type="text" 
                           name="data_noticia" 
                           id="data_noticia" 
                           placeholder="dd/mm/yyyy" 
                           maxlength="10" 
                           pattern="\d{2}/\d{2}/\d{4}" 
                           required>
                    
                    <label for="descricao_noticia">Descrição:</label><br>
                    <textarea name="descricao_noticia" id="conteudo" rows="6" cols="50" placeholder="Descrição" required></textarea>
    
                    <label for="foto_noticia">Foto da notícia(Somente .jpeg):</label><br>
                    <input type="file" name="foto_noticia" id="foto_noticia" accept="image/*"><br><br>
                </div>

                <button class="btn-primary" type="submit">Cadastrar Notícia</button>
            </form>
            <a href="noticias_adm.php" class="btn-cad">Voltar</a>
        </div>
    </div>
</body>
</html>