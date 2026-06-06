<?php
$slides_noticias = buscar_noticias($conexao, '', 3, 0);
?>
<section>
    <div class="slider"> 
        <button class="bnt-previos">&lt;-</button>
        <button class="bnt-pass">-&gt;</button>

        <div class="slides">
            <?php if (!empty($slides_noticias)): ?>
                <?php foreach ($slides_noticias as $noticia): ?>
                    <div class="slide">
                        
                        <?php if (!empty($noticia['foto_noticia'])): ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($noticia['foto_noticia']); ?>" alt="<?php echo htmlspecialchars($noticia['titulo']); ?>">
                        <?php else: ?>
                            <div class="sem-foto-slide">
                                <span>Sem imagem disponível</span>
                            </div>
                        <?php endif; ?>

                        <div class="text-slide">
                            <h2>
                                <a href="noticia_adm.php?id=<?php echo $noticia['id_noticia']; ?>">
                                    <?php echo htmlspecialchars($noticia['titulo']); ?>
                                </a>
                            </h2>
                            <p>
                                <?php 
                                    $resumo = strip_tags($noticia['descricao_noticia']);
                                    echo mb_strimwidth($resumo, 0, 120, "..."); 
                                ?>
                            </p>
                        </div>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="slide">
                    <div class="slide-vazio">
                        <h2>Nenhuma notícia cadastrada no momento.</h2>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="../src/js/script.js"></script>
</section>