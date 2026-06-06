<?php 
include('../../app/banco.php');
include('../../app/verifica_login.php'); 
include('navbar_adm.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Administrator</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="container">
        <section id="home">
            <h1 class="home-title">
                <span>EEEP</span> Manoel Mano
            </h1>

            <p class="home-description">
                Página do Administrador <br>
                Chegue como <span>você</span> é. Saia quem <span>você</span> quer ser!
                Confira o que temos a oferecer:
            </p>
        </section>

        <section id="noticias">
            <h2 class="title">
                Últimas Notícias
            </h2>
            <?php 
                include('slide_adm.php'); 
            ?>
        </section>

        <section id="cursos">
            <h2 class="title">Conheça os cursos oferecidos:</h2>
            <?php 
                include('card_cursos_adm.php');
            ?>
        </section>

        <section id="classificados">
            <h2 class="title">Alunos Classificados</h2>
            
            <div class="btn-container-adm">
                <a href="cad_classificados.php" class="btn-adicionar-novo">+ Adicionar Classificado</a>
            </div>

            <?php 
                include('card_classificados_adm.php');
            ?>
        </section>

        <section id="sobre">
            <h1 class="title">
                Sobre Nós:
            </h1>
            <p class="about-description">
                Com mais de <span>18 anos</span> de história, a <span>EEEP Manoel Mano</span> tem transformado vidas em <span>Crateús</span> ao unir ensino médio e formação técnica. Nossa missão é oferecer <span>educação de qualidade</span>, preparando jovens para o futuro e inspirando-os a alcançar <span>seus sonhos</span>.
            </p>
        </section>
    </main>
</body>
</html>