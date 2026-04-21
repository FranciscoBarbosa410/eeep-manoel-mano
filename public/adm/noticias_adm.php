<?php
session_start();
include('../../app/banco.php');

$noticias = buscar_noticias($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Notícias</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <h1>Notícias</h1>

    <a href="index_adm.php">Voltar</a>
    <a href="cad_noticias.php">Adicionar noticia</a>

    <?php foreach($noticias as $noticia) { ?>
        <div>
            <h2><?php echo htmlspecialchars($noticia['titulo']); ?></h2>
            <p><strong>Data:</strong> 
                <?php 
                    if(!empty($noticia['data_noticia'])) {
                        echo date('d/m/Y', strtotime($noticia['data_noticia']));
                    } else {
                        echo "Sem data";
                    }
                ?>
            </p>
            
            <?php if(!empty($noticia['foto_noticia'])) { ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($noticia['foto_noticia']); ?>" 
                alt="Foto da notícia" style="width:300px; height:auto;">
            <?php } else { ?>
                <p><em>Sem foto</em></p>
            <?php } ?>

            <p><?php echo nl2br(htmlspecialchars($noticia['conteudo'])); ?></p>

            <button>
                <a href="">Editar</a>
            </button>

            <button>
                <a href="">Remover</a>
            </button>
        </div>
    <?php } ?>
</body>
</html>
