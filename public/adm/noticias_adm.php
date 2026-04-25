<?php
session_start();
include('../../app/banco.php');
include('navbar_adm.php');

$noticias = buscar_noticias($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Notícias</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container">
        <h1 class="title">Notícias</h1>
    
        <a href="cad_noticias.php" class="btn">Adicionar noticia</a>
    
        <div class="noticias">
            <?php foreach($noticias as $noticia) { ?>
                <div class="card-noticia">
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
        
                    <button class="btn-primary">
                        <a href="#">Editar</a>
                    </button>
        
                    <button class="btn-primary">
                        <a href="#">Remover</a>
                    </button>
                </div>
            <?php } ?>
        </div>
    </main>

</body>
</html>
