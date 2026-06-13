<?php
session_start();
include('../app/banco.php');
include('navbar.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['mensagem'] = "Notícia não especificada.";
    header('Location: noticias.php');
    exit();
}

$id = intval($_GET['id']);

$noticia = buscar_noticia($conexao, $id);

if (!$noticia) {
    $_SESSION['mensagem'] = "Notícia não encontrada.";
    header('Location: noticias.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($noticia['titulo']); ?></title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <main id="container-noticia-unica">
        <article class="noticia-completa">
            
            <?php if(!empty($noticia['foto_noticia'])) { ?>
                <div class="capa-noticia">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($noticia['foto_noticia']); ?>" alt="Capa da Notícia">
                </div>
            <?php } ?>

            <h1 class="titulo-noticia"><?php echo htmlspecialchars($noticia['titulo']); ?></h1>
            
            <p class="data-noticia">
                <strong>Publicado em:</strong> 
                <?php 
                    echo !empty($noticia['data_noticia']) ? date('d/m/Y', strtotime($noticia['data_noticia'])) : "Sem data"; 
                ?>
            </p>
            
            <div class="conteudo-noticia">
                <?php echo nl2br(htmlspecialchars($noticia['descricao_noticia'])); ?>
            </div>
            
            <a href="noticias.php" class="btn-voltar">Voltar para Notícias</a>
        </article>
    </main>
</body>
</html>