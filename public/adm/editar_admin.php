<?php 
session_start(); // Movido para o topo para evitar erros de Headers
include('../../app/banco.php');
include('../../app/verifica_login.php');
include('navbar_adm.php');

if (!isset($_GET['id'])) {
    $_SESSION['mensagem'] = "Administrador não informado!";
    header('Location: admins.php');
    exit();
}

$id = intval($_GET['id']);

// Busca os dados atuais do administrador
$sql = "SELECT * FROM coordenacao WHERE id_coordenacao = $id";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 0) {
    $_SESSION['mensagem'] = "Administrador não encontrado!";
    header('Location: admins.php');
    exit();
}

$admin = mysqli_fetch_assoc($resultado);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
    $confirmar_senha = mysqli_real_escape_string($conexao, trim($_POST['confirmar_senha']));

    if (empty($email)) {
        $_SESSION['mensagem'] = "O campo E-mail é obrigatório!";
    } else {
        // Verifica se o usuário deseja alterar a senha (se preencheu o campo senha)
        if (!empty($senha)) {
            if ($senha !== $confirmar_senha) {
                $_SESSION['mensagem'] = "As senhas não coincidem!";
                header("Location: editar_admin.php?id=$id");
                exit();
            }
            // Atualiza E-mail e a Senha criptografada em MD5
            $sql_update = "UPDATE coordenacao SET 
                email_coordenacao='$email',
                senha_coordenacao=MD5('$senha')
                WHERE id_coordenacao=$id";
        } else {
            // Se deixou a senha em branco, atualiza apenas o E-mail
            $sql_update = "UPDATE coordenacao SET 
                email_coordenacao='$email'
                WHERE id_coordenacao=$id";
        }

        if (mysqli_query($conexao, $sql_update)) {
            $_SESSION['mensagem'] = "Administrador atualizado com sucesso!";
            header('Location: admins.php');
            exit();
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar: " . mysqli_error($conexao);
            header("Location: editar_admin.php?id=$id");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Administrador</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container">
        <div class="card">
            <div class="card-edit">
                <h1 class="titulo">Editar</h1>
                <p class="sub">Administrador</p>
                
                <?php 
                    if(isset($_SESSION['mensagem'])) {
                        echo "<p class='alert-mensagem'>" . $_SESSION['mensagem'] . "</p>";
                        unset($_SESSION['mensagem']); 
                    }
                ?>
    
                <form method="POST">
                    <div class="text">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($admin['email_coordenacao']); ?>" required>
        
                        <legend style="font-size: 0.85rem; color: var(--color-neutral-5); margin-top: 15px;">
                            * Deixe os campos de senha em branco caso não queira alterá-la.
                        </legend>

                        <label for="senha">Nova Senha (Opcional):</label>
                        <input type="password" name="senha" id="senha">
        
                        <label for="confirmar_senha">Confirmar Nova Senha:</label>
                        <input type="password" name="confirmar_senha" id="confirmar_senha">
                    </div>
    
                    <button class="btn-primary" type="submit">Salvar Alterações</button>
                </form>
                <a href="admins.php" class="btn-cad">Cancelar</a>
            </div>
        </div>
    </main>
</body>
</html>