<?php 
include('navbar_adm.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>Sobre Nós</title>
</head>
<body>


    <main id="container">
        <section id="sobre">
            <h1 class="title">
                Nos conheça
            </h1>
           <p class="about-description">
                Bem-vindo à <span>EEEP Manoel Mano</span>, um espaço onde o conhecimento acadêmico se conecta diretamente com a prática real. Nossa missão é oferecer as ferramentas necessárias para você construir uma <span>carreira de sucesso</span> desde o primeiro dia. 
                Através dos nossos cursos técnicos, você desenvolve competências exigidas pelo <span>mercado profissional corporativo e tecnológico</span>, participando de estágios e projetos práticos. Ao mesmo tempo, nossa equipe prepara você de forma intensiva para os <span>desafios universitários</span>, abrindo as portas das melhores faculdades do país.
            </p>
        </section>

        
        <section id="apresentacao">
            <?php 
                include('cardvalor_adm.php'); 
            ?>
        </section>

         <section id="apresentacao">
           
            <?php 
                include('card_adm.php'); 
            ?>
        </section>

        <section id="apresentacao">
             <?php include('historia_adm.php'); ?>
        </section>


</body>
</html>