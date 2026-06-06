<?php
session_start();
include('../app/banco.php');
include('navbar.php');

$cursos = buscar_cursos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cursos Técnicos</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <main id="container-curso-lista">
        <h1 class="title">Nossos Cursos Técnicos</h1>

        <div class="cursos-grid-page">
            <?php if (!empty($cursos)) { ?>
                <?php foreach($cursos as $curso) { ?>
                    <div class="card-curso-item">
                        <div class="container-foto-curso">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($curso['foto_curso']); ?>" alt="Imagem do Curso">
                        </div>
                        
                        <h2>
                            <a href="curso.php?id=<?php echo $curso['id_curso']; ?>">
                                Técnico em <?php echo htmlspecialchars($curso['nome_curso']); ?>
                            </a>
                        </h2>
                        
                        <p class="resumo-curso">
                            <?php echo mb_strimwidth(strip_tags($curso['descricao_curso']), 0, 120, "..."); ?>
                        </p>
                        
                        <a href="curso.php?id=<?php echo $curso['id_curso']; ?>" class="btn-acessar-curso">Conhecer Curso →</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="no-results">Nenhum curso cadastrado no momento.</p>
            <?php } ?>
        </div>
    </main>
</body>
</html>