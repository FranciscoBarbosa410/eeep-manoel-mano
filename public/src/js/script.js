let slides = document.querySelectorAll(".slide");
let index = 0;

function mostrarSlide(i){

    slides.forEach(slide => {
        slide.classList.remove("active");
    });

    slides[i].classList.add("active");
}

document.querySelector(".next").onclick = () => {

    index++;

    if(index >= slides.length){
        index = 0;
    }

    mostrarSlide(index);

}

document.querySelector(".prev").onclick = () => {

    index--;

    if(index < 0){
        index = slides.length - 1;
    }

    mostrarSlide(index);

}
