// SELECIONA ELEMENTOS
const slidesContainer = document.querySelector('.slides');
const slides = document.querySelectorAll('.slide, .slide-1');
const btnNext = document.querySelector('.bnt-pass');
const btnPrev = document.querySelector('.bnt-previos');
const slider = document.querySelector('.slider');

let index = 0;
let interval;

// FUNÇÃO PARA MOSTRAR SLIDE
function mostrarSlide(i) {

    if (i >= slides.length) {
        index = 0;
    } else if (i < 0) {
        index = slides.length - 1;
    } else {
        index = i;
    }

    slidesContainer.style.transform = `translateX(-${index * 100}%)`;
}

// PRÓXIMO SLIDE
function nextSlide() {
    mostrarSlide(index + 1);
}

// SLIDE ANTERIOR
function prevSlide() {
    mostrarSlide(index - 1);
}

// AUTOPLAY (6 segundos)
function startAutoPlay() {
    interval = setInterval(nextSlide, 6000);
}

// PARAR AUTOPLAY
function stopAutoPlay() {
    clearInterval(interval);
}

// EVENTOS DOS BOTÕES
btnNext.addEventListener('click', nextSlide);
btnPrev.addEventListener('click', prevSlide);

// PAUSAR AO PASSAR O MOUSE (efeito profissional)
slider.addEventListener('mouseenter', stopAutoPlay);
slider.addEventListener('mouseleave', startAutoPlay);

// INICIAR
mostrarSlide(index);
startAutoPlay();