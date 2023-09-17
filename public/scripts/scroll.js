var scrollableDiv = document.getElementById("carddivscroll");

if (scrollableDiv) {
    scrollableDiv.addEventListener("wheel", function(event) {
        event.preventDefault();
        scrollableDiv.scrollLeft += event.deltaY;
    });
}


const loadingDiv = document.querySelector('.loader');

document.addEventListener('DOMContentLoaded', function () {
    // Configura a transição CSS para a opacidade
    loadingDiv.style.transition = 'opacity 1s';

    // Define a opacidade inicial para 1
    loadingDiv.style.opacity = '1';

    // Aguarda um pequeno intervalo para iniciar o fade-out
    setTimeout(function () {
        // Reduz a opacidade para 0
        loadingDiv.style.opacity = '0';
        
        // Quando a transição terminar, defina display: none
        loadingDiv.addEventListener('transitionend', function () {
            loadingDiv.style.display = 'none';
        });
    }, 1000);
});
