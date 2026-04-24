<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <main id="container">
        <section id="home">
            <h1 class="home-title">
                <span>EEEP</span> Manoel Mano
            </h1>

            <p class="home-description">
                Chegue como <span>você</span> é. Saia quem <span>você</span> quer ser!
                Confira o que temos a oferecer:
            </p>
        </section>

        <section id="noticias">
            <h2 class="title">
                Últimas Notícias
            </h2>
            <?php 
                include('slide_noticias.php'); 
            ?>
        </section>

        <section id="cursos">
            <h2 class="title">Conheça os cursos oferecidos:</h2>
            <?php 
                include('card_cursos.php');
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

    <?php //include('footer.php'); ?>
</body>
</html>