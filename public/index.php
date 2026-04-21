<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <main id="container">
        <section id="home">
            <h1 class="home-title">
                EEEP <span>Manoel Mano</span>
            </h1>

            <p class="home-description">
                Chegue como <span>você</span> é. Saia quem <span>você</span> quer ser!
            </p>
        </section>

        <section id="noticias">

        </section>
        <?php 
            //problema:sem o slide_noticias, o css nao carrega
            include('slide_noticias.php'); 
            include('card_cursos.php');
        ?>
    </main>
</body>
</html>