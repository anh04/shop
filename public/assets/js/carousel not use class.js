var buttonPrevious = document.querySelector('[data-carousel-button-previous]');
var buttonNext = document.querySelector('[data-carousel-button-next]');
var slidesContainer = document.querySelector('[data-carousel-slides-container]');

let currentSlide = 0;
let numberSlices = slidesContainer.children.length
console.log(numberSlices)

function handleNext() {
    currentSlide  = (currentSlide + 1) % numberSlices
    if(currentSlide > numberSlices) currentSlide =0
   // if(numberSlices > numberSlices) numberSlices =0
    // slidesContainer.style.transform = `translateX(${currentSlide * -100}%)`
    // use --current-slide in css
    slidesContainer.style.setProperty('--current-slide', currentSlide);
}

function handlePrevious() {
    currentSlide = modulo(currentSlide -1, numberSlices)
    //slidesContainer.style.transform = `translateX(${currentSlide * -100}%)`
    // use --current-slide in css
    slidesContainer.style.setProperty('--current-slide', currentSlide);
}

function modulo(number, mod){
    let result  =number % mod
    if(result < 0){
        result +=mod
    }

    return result
}

buttonNext.addEventListener('click',handleNext)
buttonPrevious.addEventListener('click',handlePrevious)
