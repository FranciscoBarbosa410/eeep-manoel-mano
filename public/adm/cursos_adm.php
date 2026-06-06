<?php
session_start();
include('../../app/banco.php');
include('navbar_adm.php');

$cursos = buscar_cursos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cursos Técnicos - Administração</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container-curso-lista">
        <h1 class="title">Nossos Cursos Técnicos</h1>

        <?php
            if(isset($_SESSION['mensagem'])) {
                echo "<p class='alert-mensagem' style='text-align:center; color: var(--color-primary-1); font-weight:bold;'>" . $_SESSION['mensagem'] . "</p>";
                unset($_SESSION['mensagem']); 
            }
        ?>

        <div class="cursos-grid-page">
            <?php if (!empty($cursos)) { ?>
                <?php foreach($cursos as $curso) { ?>
                    <div class="card-curso-item">
                        <div class="container-foto-curso">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($curso['foto_curso']); ?>" alt="Imagem do Curso">
                        </div>
                        
                        <h2>
                            <a href="curso_adm.php?id=<?php echo $curso['id_curso']; ?>">
                                Técnico em <?php echo htmlspecialchars($curso['nome_curso']); ?>
                            </a>
                        </h2>
                        
                        <p class="resumo-curso">
                            <?php echo mb_strimwidth(strip_tags($curso['descricao_curso']), 0, 120, "..."); ?>
                        </p>
                        
                        <a href="curso_adm.php?id=<?php echo $curso['id_curso']; ?>" class="btn-acessar-curso">Conhecer Curso →</a>

                        <div class="acoes-adm" style="margin-top: 15px; width: 100%; display: flex; flex-direction: column; gap: 8px;">
                            <button class="btn-primary" style="width: 100%; padding: 8px; border: none; border-radius: 6px; cursor: pointer; background: var(--color-primary-1);">
                                <a href="editar_curso.php?id=<?php echo $curso['id_curso']; ?>" style="color: white; text-decoration: none; display: block; font-weight: bold; text-align: center;">
                                    Editar Curso
                                </a>
                            </button>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="no-results">Nenhum curso cadastrado no momento.</p>
            <?php } ?>
        </div>
    </main>
</body>
</html>