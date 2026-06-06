<?php 
include('../../app/banco.php');
include('../../app/verifica_login.php');
include('navbar_adm.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['mensagem'] = "Curso não informado!";
    header('Location: cursos_adm.php');
    exit();
}

$id = intval($_GET['id']);

// Utiliza a função que já existe no seu banco.php para trazer os dados atuais do curso
$curso = buscar_curso($conexao, $id);

if (!$curso) {
    $_SESSION['mensagem'] = "Curso não encontrado!";
    header('Location: cursos_adm.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escapa os caracteres para evitar erros de sintaxe no SQL
    $nome_curso = mysqli_real_escape_string($conexao, $_POST['nome_curso']);
    $descricao_curso = mysqli_real_escape_string($conexao, $_POST['descricao_curso']);

    // Verifica se uma nova foto foi enviada
    if (!empty($_FILES['foto_curso']['tmp_name'])) {
        $foto_curso = addslashes(file_get_contents($_FILES['foto_curso']['tmp_name']));
        $sql_update = "UPDATE curso SET 
            nome_curso='$nome_curso',
            descricao_curso='$descricao_curso',
            foto_curso='$foto_curso'
            WHERE id_curso=$id";
    } else {
        // Se não enviou foto, mantém a foto atual
        $sql_update = "UPDATE curso SET 
            nome_curso='$nome_curso',
            descricao_curso='$descricao_curso'
            WHERE id_curso=$id";
    }

    if (mysqli_query($conexao, $sql_update)) {
        $_SESSION['mensagem'] = "Curso atualizado com sucesso!";
        header('Location: cursos_adm.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar: " . mysqli_error($conexao);
        header('Location: cursos_adm.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container">

        <div class="card">
            <div class="card-edit">
                <h1 class="titulo">Editar</h1>
                <p class="sub">Curso Técnico</p>
                <?php 
                    if(isset($_SESSION['mensagem'])) {
                        echo "<p class='alert-mensagem'>" . $_SESSION['mensagem'] . "</p>";
                        unset($_SESSION['mensagem']); 
                    }
                ?>
    
                <form method="POST" enctype="multipart/form-data">
                    <div class="text">
                        <label for="nome_curso">Nome do Curso:</label>
                        <input type="text" name="nome_curso" id="nome_curso" value="<?php echo htmlspecialchars($curso['nome_curso']); ?>" required>
        
                        <label for="descricao_curso">Descrição:</label>
                        <textarea name="descricao_curso" id="descricao_curso" rows="6" cols="50" required><?php echo htmlspecialchars($curso['descricao_curso']); ?></textarea>
        
                        <label for="foto_curso">Nova foto do curso (Opcional - Somente .jpeg):</label>
                        <input type="file" name="foto_curso" id="foto_curso" accept="image/*">
        
                        <?php if (!empty($curso['foto_curso'])): ?>
                            <p>Foto atual:</p>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($curso['foto_curso']); ?>" 
                                 alt="Foto do curso" width="200" style="border-radius: 6px;">
                        <?php endif; ?>
                    </div>
    
                    <button class="btn-primary" type="submit">Salvar Alterações</button>
                </form>
                <a href="cursos_adm.php" class="btn-cad">Cancelar</a>
            </div>
        </div>
    </main>
</body>
</html>