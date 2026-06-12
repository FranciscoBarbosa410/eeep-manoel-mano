<?php 
    session_start();
    include('../../app/banco.php');
    include('navbar_adm.php');

    // Executa a função para buscar os administradores
    $admins = buscar_admins($conexao);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Administradores</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container-admin">
        <h1 class="title">Administradores do Sistema</h1>
        <a href="cad_admins.php" class="btn">+ Adicionar administrador</a>

        <?php
            if(isset($_SESSION['mensagem'])) {
                echo "<p class='alert-mensagem'>" . $_SESSION['mensagem'] . "</p>";
                unset($_SESSION['mensagem']); 
            }
        ?>

        <div class="table-container">
            <?php if (!empty($admins)) { ?>
                <table class="table-admins">
                    <thead>
                        <tr>
                            <th>E-mail</th>
                            <th class="actions-header">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($admins as $admin) { ?>
                            <tr>
                                <td data-label="E-mail">
                                    <?php echo htmlspecialchars($admin['email_coordenacao']); ?>
                                </td>
                                <td data-label="Ações" class="actions-cell">
                                    <a href="editar_admin.php?id=<?php echo $admin['id_coordenacao']; ?>" class="btn-table-primary">
                                        Editar
                                    </a>
                                    <a href="remover_admin.php?id=<?php echo $admin['id_coordenacao']; ?>" 
                                       class="btn-table-secondary"
                                       onclick="return confirm('Tem certeza que deseja remover este administrador?');">
                                        Remover
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p class="no-records">Nenhum administrador cadastrado no momento.</p>
            <?php } ?>
        </div>
    </main>
</body>
</html>