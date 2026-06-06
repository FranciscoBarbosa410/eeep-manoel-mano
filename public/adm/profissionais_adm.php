<?php 
    session_start();
    include('../../app/banco.php');
    include('navbar_adm.php');

    $profissionais = buscar_profissionais($conexao);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Profissionais - Administração</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container-profissional">
        <h1 class="title">Grupo gestor da nossa escola</h1>
        <a href="cad_profissionais.php" class="btn">Adicionar profissional</a>

        <?php
            if(isset($_SESSION['mensagem'])) {
                echo "<p class='alert-mensagem' style='text-align:center; color: var(--color-primary-1); font-weight:bold;'>" . $_SESSION['mensagem'] . "</p>";
                unset($_SESSION['mensagem']); 
            }
        ?>

        <div class="profissionais">
            <?php if (!empty($profissionais)) { ?>
                <?php foreach($profissionais as $profissional) { ?>
                    <div class="card-profissional">
                        
                        <?php if(!empty($profissional['foto_profissional'])) { ?>
                            <div class="avatar-profissional">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($profissional['foto_profissional']); ?>" 
                                alt="Foto de <?php echo htmlspecialchars($profissional['nome_profissional']); ?>">
                            </div>
                        <?php } else { ?>
                            <div class="avatar-profissional sem-foto">
                                <span>Preenchimento</span>
                            </div>
                        <?php } ?>

                        <h2><?php echo htmlspecialchars($profissional['nome_profissional']); ?></h2>
            
                        <p class="descricao-texto"><?php echo nl2br(htmlspecialchars($profissional['descricao_profissional'])); ?></p>
            
                        <div class="acoes-profissional">
                            <button class="btn-primary">
                                <a href="editar_profissional.php?id=<?php echo $profissional['id_profissional']; ?>">
                                    Editar
                                </a>
                            </button>
                
                            <button class="btn-secondary">
                                <a href="remover_profissional.php?id=<?php echo $profissional['id_profissional']; ?>"
                                   onclick="return confirm('Tem certeza que deseja remover este profissional?');">
                                    Remover
                                </a>
                            </button>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="no-results">Nenhum profissional cadastrado no momento.</p>
            <?php } ?>
        </div>

    </main>
</body>
</html>