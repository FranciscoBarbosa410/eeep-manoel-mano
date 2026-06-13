<?php
session_start();
include('../app/banco.php');
include('navbar.php');

$termo_pesquisa = isset($_GET['busca']) ? $_GET['busca'] : '';
$pagina_atual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$noticias_por_pagina = 6;

$total_noticias = contar_noticias($conexao, $termo_pesquisa);

$total_paginas = ceil($total_noticias / $noticias_por_pagina);
if ($total_paginas < 1) { $total_paginas = 1; }

if ($pagina_atual > $total_paginas) { $pagina_atual = $total_paginas; }

$offset = ($pagina_atual - 1) * $noticias_por_pagina;

$noticias = buscar_noticias($conexao, $termo_pesquisa, $noticias_por_pagina, $offset);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Notícias</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <main id="container-noticia">
        <h1 class="title">Notícias</h1>

        <div class="search-container">
            <form action="noticias.php" method="GET" class="search-form">
                <input type="text" name="busca" placeholder="Pesquisar notícias..." value="<?php echo htmlspecialchars($termo_pesquisa); ?>">
                <button type="submit" class="btn-search">Buscar</button>
                <?php if(!empty($termo_pesquisa)): ?>
                    <a href="noticias.php" class="btn-clear">Limpar</a>
                <?php endif; ?>
            </form>
        </div>

        <div class="contador-noticias">
            <?php if (!empty($termo_pesquisa)): ?>
                Exibindo <?php echo $total_noticias; ?> resultado<?php echo $total_noticias === 1 ? '' : 's'; ?> para "<?php echo htmlspecialchars($termo_pesquisa); ?>".
            <?php else: ?>
                Total de notícias: <?php echo $total_noticias; ?>
            <?php endif; ?>
        </div>

        <div class="noticias">
            <?php if (!empty($noticias)) { ?>
                <?php foreach($noticias as $noticia) { ?>
                    <div class="card-noticia">
                        <h2>
                            <a href="noticia.php?id=<?php echo $noticia['id_noticia']; ?>">
                                <?php echo htmlspecialchars($noticia['titulo']); ?>
                            </a>
                        </h2>
                        <p class="data-card"><strong>Data:</strong> 
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
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="no-results">Nenhuma notícia encontrada para a sua busca.</p>
            <?php } ?>
        </div>

        <?php if ($total_paginas > 1): ?>
            <div class="pagination">
                <?php if ($pagina_atual > 1): ?>
                    <a href="noticias.php?pagina=<?php echo $pagina_atual - 1; ?>&busca=<?php echo urlencode($termo_pesquisa); ?>" class="page-link">&laquo; Anterior</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <a href="noticias.php?pagina=<?php echo $i; ?>&busca=<?php echo urlencode($termo_pesquisa); ?>" class="page-link <?php echo ($i === $pagina_atual) ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($pagina_atual < $total_paginas): ?>
                    <a href="noticias.php?pagina=<?php echo $pagina_atual + 1; ?>&busca=<?php echo urlencode($termo_pesquisa); ?>" class="page-link">Próxima &raquo;</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </main>
</body>
</html>