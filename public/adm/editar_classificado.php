<?php 
include('../../app/banco.php');
include('../../app/verifica_login.php');
include('navbar_adm.php');

if (!isset($_GET['id'])) {
    $_SESSION['mensagem'] = "Classificado não informado!";
    header('Location: index_adm.php');
    exit();
}

$id = intval($_GET['id']);

// Busca o classificado específico para preencher o formulário
$sql = "SELECT * FROM classificados WHERE id_classificado = $id";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 0) {
    $_SESSION['mensagem'] = "Classificado não encontrado!";
    header('Location: index_adm.php');
    exit();
}

$classificado = mysqli_fetch_assoc($resultado);

// Processa o formulário quando enviado (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_classificado = mysqli_real_escape_string($conexao, $_POST['nome_classificado']);
    $curso_aprovado = mysqli_real_escape_string($conexao, $_POST['curso_aprovado']);
    $instituicao_aprovada = mysqli_real_escape_string($conexao, $_POST['instituicao_aprovada']);

    if (!empty($_FILES['foto_classificado']['tmp_name'])) {
        $foto_classificado = addslashes(file_get_contents($_FILES['foto_classificado']['tmp_name']));
        $sql_update = "UPDATE classificados SET 
            nome_classificado='$nome_classificado',
            curso_aprovado='$curso_aprovado',
            instituicao_aprovada='$instituicao_aprovada',
            foto_classificado='$foto_classificado'
            WHERE id_classificado=$id";
    } else {
        $sql_update = "UPDATE classificados SET 
            nome_classificado='$nome_classificado',
            curso_aprovado='$curso_aprovado',
            instituicao_aprovada='$instituicao_aprovada'
            WHERE id_classificado=$id";
    }

    if (mysqli_query($conexao, $sql_update)) {
        $_SESSION['mensagem'] = "Classificado atualizado com sucesso!";
        header('Location: index_adm.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar: " . mysqli_error($conexao);
        header('Location: index_adm.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Classificado</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container">

        <div class="card">
            <div class="card-edit">
                <h1 class="titulo">Editar</h1>
                <p class="sub">Classificado</p>
                <?php 
                    if(isset($_SESSION['mensagem'])) {
                        echo "<p>" . $_SESSION['mensagem'] . "</p>";
                        unset($_SESSION['mensagem']); 
                    }
                ?>
    
                <form method="POST" enctype="multipart/form-data">
                    <div class="text">
                        <label for="nome_classificado">Nome Completo:</label>
                        <input type="text" name="nome_classificado" id="nome_classificado" value="<?php echo htmlspecialchars($classificado['nome_classificado']); ?>" required>
        
                        <label for="curso_aprovado">Curso:</label>
                        <input type="text" name="curso_aprovado" id="curso_aprovado" value="<?php echo htmlspecialchars($classificado['curso_aprovado']); ?>" required>

                        <label for="instituicao_aprovada">Instituição:</label>
                        <input type="text" name="instituicao_aprovada" id="instituicao_aprovada" value="<?php echo htmlspecialchars($classificado['instituicao_aprovada']); ?>" required>

                        <label for="foto_classificado">Nova foto do estudante (Opcional - Somente .jpeg):</label>
                        <input type="file" name="foto_classificado" id="foto_classificado" accept="image/*">
        
                        <?php if (!empty($classificado['foto_classificado'])): ?>
                            <p>Foto atual:</p>
                            <div style="width: 95px; height: 95px; border-radius: 50%; overflow: hidden; margin-bottom: 15px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($classificado['foto_classificado']); ?>" 
                                     alt="Foto do estudante" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        <?php endif; ?>
                    </div>
    
                    <button class="btn-primary" type="submit">Salvar Alterações</button>
                </form>
                <a href="index_adm.php" class="btn-cad">Cancelar</a>
            </div>
        </div>
    </main>
</body>
</html>