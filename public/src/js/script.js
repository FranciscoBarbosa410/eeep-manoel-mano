// ELEMENTOS
const slidesContainer = document.querySelector('.slides');
const slides = document.querySelectorAll('.slide');
const btnNext = document.querySelector('.bnt-pass');
const btnPrev = document.querySelector('.bnt-previos');
const slider = document.querySelector('.slider');

let index = 0;
let interval;

function mostrarSlide(i) {

    if (i >= slides.length) index = 0;
    else if (i < 0) index = slides.length - 1;
    else index = i;

    slidesContainer.style.transform = `translateX(-${index * 100}%)`;
}

function nextSlide() {
    mostrarSlide(index + 1);
}

function prevSlide() {
    mostrarSlide(index - 1);
}

function startAutoPlay() {
    interval = setInterval(nextSlide, 6000);
}

function stopAutoPlay() {
    clearInterval(interval);
}

btnNext.addEventListener('click', nextSlide);
btnPrev.addEventListener('click', prevSlide);

slider.addEventListener('mouseenter', stopAutoPlay);
slider.addEventListener('mouseleave', startAutoPlay);

mostrarSlide(0);
startAutoPlay();