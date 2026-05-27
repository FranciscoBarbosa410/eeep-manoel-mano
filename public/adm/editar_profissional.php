<?php 
include('../../app/banco.php');
include('../../app/verifica_login.php');
include('navbar_adm.php');

if (!isset($_GET['id'])) {
    $_SESSION['mensagem'] = "Profissional não informado!";
    header('Location: profissionais_adm.php');
    exit();
}

$id = intval($_GET['id']);

// Busca os dados atuais do profissional
$sql = "SELECT * FROM profissionais WHERE id_profissional = $id";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 0) {
    $_SESSION['mensagem'] = "Profissional não encontrado!";
    header('Location: profissionais_adm.php');
    exit();
}

$profissional = mysqli_fetch_assoc($resultado);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escapa os caracteres para evitar erros de sintaxe no SQL (como aspas simples)
    $nome_profissional = mysqli_real_escape_string($conexao, $_POST['nome_profissional']);
    $descricao_profissional = mysqli_real_escape_string($conexao, $_POST['descricao_profissional']);

    // Verifica se uma nova foto foi enviada
    if (!empty($_FILES['foto_profissional']['tmp_name'])) {
        $foto_profissional = addslashes(file_get_contents($_FILES['foto_profissional']['tmp_name']));
        $sql_update = "UPDATE profissionais SET 
            nome_profissional='$nome_profissional',
            descricao_profissional='$descricao_profissional',
            foto_profissional='$foto_profissional'
            WHERE id_profissional=$id";
    } else {
        // Se não enviou foto, mantém a foto atual
        $sql_update = "UPDATE profissionais SET 
            nome_profissional='$nome_profissional',
            descricao_profissional='$descricao_profissional'
            WHERE id_profissional=$id";
    }

    if (mysqli_query($conexao, $sql_update)) {
        $_SESSION['mensagem'] = "Profissional atualizado com sucesso!";
        header('Location: profissionais_adm.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar: " . mysqli_error($conexao);
        header('Location: profissionais_adm.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profissional</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container">

        <div class="card">
            <div class="card-edit">
                <h1 class="titulo">Editar</h1>
                <p class="sub">Profissional</p>
                <?php 
                    session_start();
                    if(isset($_SESSION['mensagem'])) {
                        echo "<p>" . $_SESSION['mensagem'] . "</p>";
                        unset($_SESSION['mensagem']); 
                    }
                ?>
    
                <form method="POST" enctype="multipart/form-data">
                    <div class="text">
                        <label for="nome_profissional">Nome:</label>
                        <input type="text" name="nome_profissional" id="nome_profissional" value="<?php echo htmlspecialchars($profissional['nome_profissional']); ?>" required>
        
                        <label for="descricao_profissional">Descrição:</label>
                        <input type="text" name="descricao_profissional" id="descricao_profissional" value="<?php echo htmlspecialchars($profissional['descricao_profissional']); ?>" required>
        
                        <label for="foto_profissional">Nova foto do profissional (Opcional - Somente .jpeg):</label><br>
                        <input type="file" name="foto_profissional" id="foto_profissional" accept="image/*"><br><br>
        
                        <?php if (!empty($profissional['foto_profissional'])): ?>
                            <p>Foto atual:</p>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($profissional['foto_profissional']); ?>" 
                                 alt="Foto do profissional" width="200">
                        <?php endif; ?>
                    </div>
    
                    <button class="btn-primary" type="submit">Salvar Alterações</button>
                </form>
                <a href="profissionais_adm.php" class="btn-cad">Cancelar</a>
            </div>
        </div>
    </main>
</body>
</html>