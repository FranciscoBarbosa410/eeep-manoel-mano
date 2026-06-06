<?php 
    $classificados = buscar_classificados($conexao);
?>

<div id="container-classificados">
    <div class="classificados-grid">
        <?php if (!empty($classificados)): ?>
            <?php foreach($classificados as $classificado): ?>
                <div class="card-classificado">
                    
                    <div class="capa-classificado">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($classificado['foto_classificado']); ?>" 
                             alt="Foto de <?php echo htmlspecialchars($classificado['nome_classificado']); ?>">
                    </div>

                    <div class="conteudo-classificado">
                        <h3><?php echo htmlspecialchars($classificado['nome_classificado']); ?></h3>
                        <p class="info-aprovacao">
                            <span>Curso:</span> <?php echo htmlspecialchars($classificado['curso_aprovado']); ?><br>
                            <span>Instituição:</span> <?php echo htmlspecialchars($classificado['instituicao_aprovada']); ?>
                        </p>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="sem-classificados">Nenhum aluno classificado registrado no momento.</p>
        <?php endif; ?>
    </div>
</div>