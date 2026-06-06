<?php 
include('../../app/banco.php');
include('../../app/verifica_login.php'); // Certifique-se que este arquivo já possui session_start();
include('navbar_adm.php');

if (!isset($_GET['id'])) {
    $_SESSION['mensagem'] = "Notícia não informada!";
    header('Location: noticias_adm.php');
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM noticias WHERE id_noticia = $id";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 0) {
    $_SESSION['mensagem'] = "Notícia não encontrada!";
    header('Location: noticias_adm.php');
    exit();
}

$noticia = mysqli_fetch_assoc($resultado);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $descricao_noticia = mysqli_real_escape_string($conexao, $_POST['descricao_noticia']);
    
    $data_input = $_POST['data_noticia']; 
    $partes_data = explode('/', $data_input);
    if (count($partes_data) == 3) {
        $data_noticia = $partes_data[2] . '-' . $partes_data[1] . '-' . $partes_data[0];
    } else {
        $data_noticia = date('Y-m-d'); 
    }
    if (!empty($_FILES['foto_noticia']['tmp_name'])) {
        $foto_noticia = addslashes(file_get_contents($_FILES['foto_noticia']['tmp_name']));
        $sql_update = "UPDATE noticias SET 
            titulo='$titulo',
            data_noticia='$data_noticia',
            descricao_noticia='$descricao_noticia',
            foto_noticia='$foto_noticia'
            WHERE id_noticia=$id";
    } else {
        $sql_update = "UPDATE noticias SET 
            titulo='$titulo',
            data_noticia='$data_noticia',
            descricao_noticia='$descricao_noticia'
            WHERE id_noticia=$id";
    }

    if (mysqli_query($conexao, $sql_update)) {
        $_SESSION['mensagem'] = "Notícia atualizada com sucesso!";
        header('Location: noticias_adm.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar: " . mysqli_error($conexao);
        header('Location: noticias_adm.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notícias</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container">
        <div class="card">
            <div class="card-edit">
                <h1 class="titulo">Editar</h1>
                <p class="sub">Notícia</p>
                <?php 
                    // Removido o session_start() duplicado daqui
                    if(isset($_SESSION['mensagem'])) {
                        echo "<p>" . $_SESSION['mensagem'] . "</p>";
                        unset($_SESSION['mensagem']); 
                    }
                ?>
    
                <form method="POST" enctype="multipart/form-data">
                    <div class="text">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" maxlength="100" value="<?php echo htmlspecialchars($noticia['titulo']); ?>" required>
        
                        <label for="data_noticia">Data da notícia (dd/mm/aaaa):</label>
                        <input type="text" name="data_noticia" id="data_noticia" placeholder="Formatado: dd/mm/aaaa" maxlength="10" pattern="\d{2}/\d{2}/\d{4}" value="<?php echo date('d/m/Y', strtotime($noticia['data_noticia'])); ?>" required>
                        
                        <label for="conteudo">Descrição:</label>
                        <textarea name="descricao_noticia" id="conteudo" rows="6" cols="50" required><?php echo htmlspecialchars($noticia['descricao_noticia']); ?></textarea>
        
                        <label for="foto_noticia">Nova foto da notícia (opcional):</label>
                        <input type="file" name="foto_noticia" id="foto_noticia" accept="image/*">
        
                        <?php if (!empty($noticia['foto_noticia'])): ?>
                            <p>Foto atual:</p>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($noticia['foto_noticia']); ?>" 
                                alt="Foto da notícia" width="200">
                        <?php endif; ?>
                    </div>
    
                    <button class="btn-primary" type="submit">Salvar Alterações</button>
                </form>
                <a href="noticias_adm.php" class="btn-cad">Cancelar</a>
            </div>
        </div>
    </main>
</body>
</html>