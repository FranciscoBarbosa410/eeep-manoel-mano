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
    <title>Lista de Profissionais</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container-profissional">
        <h1 class="title">Profissionais da nossa escola</h1>
        <a href="cad_profissionais.php" class="btn">Adicionar profissional</a>

        <?php 
            // session_start(); -> Removido daqui pois já está na linha 2
            if(isset($_SESSION['mensagem'])) {
                echo "<p>" . $_SESSION['mensagem'] . "</p>";
                unset($_SESSION['mensagem']); 
            }
        ?>

        <div class="profissionais">
            <?php if (!empty($profissionais)) { ?>
                <?php foreach($profissionais as $profissional) { ?>
                    <div class="card-profissional">
                        <h2><?php echo htmlspecialchars($profissional['nome_profissional']); ?></h2>
                        
                        <?php if(!empty($profissional['foto_profissional'])) { ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($profissional['foto_profissional']); ?>" 
                            alt="Foto de <?php echo htmlspecialchars($profissional['nome_profissional']); ?>" style="width:200px; height:auto; border-radius: 50%;">
                        <?php } else { ?>
                            <p><em>Sem foto</em></p>
                        <?php } ?>
            
                        <p><?php echo nl2br(htmlspecialchars($profissional['descricao_profissional'])); ?></p>
            
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
                <?php } ?>
            <?php } else { ?>
                <p>Nenhum profissional cadastrado no momento.</p>
            <?php } ?>
        </div>

    </main>
</body>
</html>