<?php
session_start();
include('../app/banco.php');
include('navbar.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: cursos.php');
    exit();
}

$id = intval($_GET['id']);
$curso = buscar_curso($conexao, $id);

if (!$curso) {
    header('Location: cursos.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Técnico em <?php echo htmlspecialchars($curso['nome_curso']); ?></title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <main id="container-curso-unico">
        <article class="curso-completo">
            
            <?php if(!empty($curso['foto_curso'])) { ?>
                <div class="capa-curso-detalhe">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($curso['foto_curso']); ?>" alt="Capa do Curso">
                </div>
            <?php } ?>

            <h1 class="titulo-curso">Técnico em <?php echo htmlspecialchars($curso['nome_curso']); ?></h1>
            
            <div class="conteudo-curso-detalhe">
                <h3>Sobre a Formação Técnica:</h3>
                <p><?php echo nl2br(htmlspecialchars($curso['descricao_curso'])); ?></p>
            </div>
            
            <a href="cursos.php" class="btn-voltar">Voltar para Cursos</a>
        </article>
    </main>
</body>
</html>