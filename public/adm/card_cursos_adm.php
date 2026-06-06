<?php 
    $cursos = buscar_cursos($conexao);
?>

<div id="container-cursos">
    <div class="cursos-grid">
        <?php if (!empty($cursos)): ?>
            <?php foreach($cursos as $curso): ?>
                <a href="curso_adm.php?id=<?php echo $curso['id_curso']; ?>" class="card-curso">
                    
                    <div class="capa-curso">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($curso['foto_curso']); ?>" 
                             alt="Curso de <?php echo htmlspecialchars($curso['nome_curso']); ?>">
                    </div>

                    <div class="conteudo-curso">
                        <h2><?php echo htmlspecialchars($curso['nome_curso']); ?></h2>
                        <span class="btn-ver-mais">Conhecer Curso →</span>
                    </div>

                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="sem-cursos">Nenhum curso técnico disponível no momento.</p>
        <?php endif; ?>
    </div>
</div>