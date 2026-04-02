
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina-Inicial(noticias)</title>
     <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
     <?php include('navbar.php'); ?>

    <div class="master-back">
        <div class="noticias1">
            <h1 class="text">Ultimas noticias</h1>
            <!--painel de noticias-->
            <div class="slider"> 
               <button class="bnt-previos">‹</button>
               <button class="bnt-pass">›</button>
           <div class="slides">

    <div class="slide">
        <img src="https://cdn.pixabay.com/photo/2023/06/16/00/09/car-model-8066718_1280.jpg" alt="">
        <div class="text-slide">
            <h2>Alguma-noticia</h2>
            <p>texto da noticia</p>
        </div>
    </div>

    <div class="slide">
        <img src="https://www.razaoautomovel.com/wp-content/uploads/2019/02/Lamborghini-Veneno.jpg" alt="">
        <div class="text-slide">
            <h2>Alguma-noticia-02</h2>
            <p>texto da noticia</p>
        </div>
    </div>

    <div class="slide">
        <img src="https://images.pexels.com/photos/30816058/pexels-photo-30816058.jpeg?cs=srgb&dl=pexels-cesar-sanchez-2149834931-30816058.jpg&fm=jpg" alt="">
        <div class="text-slide">
            <h2>Alguma-noticia-03</h2>
            <p>texto da noticia</p>
        </div>
    </div>

</div>
            </div>

            <!--noticias abaixo-->
            <div class="noticias2">

                <div class="grid-noticias">
            <!--1-->
            <div class="card-noticia">
                <img src="" alt=""> <!---Imagem ainda sera decidida-->
                <h3>card-noticia-01</h3>
                <p>texto da noticia que ira ser apresentado-01</p>
            </div>
             <!--2-->
            <div class="card-noticia">
                <img src="" alt=""> <!---Imagem ainda sera decidida-->
                <h3>card-noticia-02</h3>
                <p>texto da noticia que ira ser apresentado-02</p>
            </div>
            <!--3-->
            <div class="card-noticia">
                <img src="" alt=""> <!---Imagem ainda sera decidida-->
                <h3>card-noticia-03</h3>
                <p>texto da noticia que ira ser apresentado-03</p>

            </div>

            </div>
            </div>
        </div>
    </div>
  

<script>

// ELEMENTOS
const slidesContainer = document.querySelector('.slides');
const slides = document.querySelectorAll('.slide');
const btnNext = document.querySelector('.bnt-pass');
const btnPrev = document.querySelector('.bnt-previos');
const slider = document.querySelector('.slider');

let index = 0;
let interval;

// MOSTRAR SLIDE
function mostrarSlide(i) {

    if (i >= slides.length) index = 0;
    else if (i < 0) index = slides.length - 1;
    else index = i;

    slidesContainer.style.transform = `translateX(-${index * 100}%)`;
}

// CONTROLES
function nextSlide() {
    mostrarSlide(index + 1);
}

function prevSlide() {
    mostrarSlide(index - 1);
}

// AUTOPLAY
function startAutoPlay() {
    interval = setInterval(nextSlide, 6000);
}

function stopAutoPlay() {
    clearInterval(interval);
}

// EVENTOS
btnNext.addEventListener('click', nextSlide);
btnPrev.addEventListener('click', prevSlide);

slider.addEventListener('mouseenter', stopAutoPlay);
slider.addEventListener('mouseleave', startAutoPlay);

// INICIAR
mostrarSlide(0);
startAutoPlay();

</script>

</body>
</html>


<style>
/* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    background-color: #f4f6f9;
    color: #333;
}

/* CONTAINER PRINCIPAL */
.master-back {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 20px;
}

.noticias1 {
    width: 100%;
    max-width: 1100px;
}

/* TITULO */
.text {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #1a237e;
    border-left: 5px solid #3949ab;
    padding-left: 10px;
}

/* SLIDER */
.slider {
    position: relative;
    background: #fff;
    border-radius: 10px;
    overflow: hidden; /* IMPORTANTE */
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

/* ÁREA DOS SLIDES */
.slides {
    display: flex;
    width: 100%;
    transition: transform 0.5s ease-in-out;
}

/* CADA SLIDE OCUPA 100% */
.slide {
    min-width: 100%;
    background: #fafafa;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s;
}

.slide:hover {
    transform: scale(1.02);
}

/* IMAGENS */
.slide img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    background: #ccc;
    display: block;
}

/* TEXTO */
.text-slide {
    padding: 15px;
}

.text-slide h2 {
    font-size: 1.4rem;
    margin-bottom: 8px;
    color: #1a237e;
}

.text-slide p {
    font-size: 1rem;
}

/* BOTÕES */
.bnt-pass, .bnt-previos {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(57, 73, 171, 0.8);
    color: #fff;
    border: none;
    padding: 12px;
    cursor: pointer;
    border-radius: 50%;
    z-index: 10;
}

.bnt-pass {
    right: 10px;
}

.bnt-previos {
    left: 10px;
}

.bnt-pass:hover, .bnt-previos:hover {
    background: #1a237e;
}

/* GRID DE NOTÍCIAS */
.noticias2 {
    margin-top: 20px;
}

.grid-noticias {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

/* CARD */
.card-noticia {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    padding-bottom: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.08);
    transition: transform 0.3s;
}

.card-noticia:hover {
    transform: translateY(-5px);
}

.card-noticia img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    background: #ccc;
}

.card-noticia h3 {
    font-size: 1.1rem;
    padding: 10px;
    color: #1a237e;
}

.card-noticia p {
    font-size: 0.9rem;
    padding: 0 10px;
}

/* RESPONSIVO */
@media (max-width: 768px) {
    .text {
        font-size: 1.5rem;
    }

     .slide img {
        height: 200px;
    }
}



</style>