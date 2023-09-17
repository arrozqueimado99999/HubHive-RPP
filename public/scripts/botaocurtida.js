document.addEventListener("DOMContentLoaded", function() {
    const meuBotao = document.getElementById("likeBtn");
    const hu = document.getElementById("hu");
    const iconline = `<svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M16.544 3.75c-3.043 0-4.543 3-4.543 3s-1.5-3-4.544-3C4.984 3.75 3.026 5.82 3 8.288c-.051 5.125 4.066 8.77 8.579 11.832a.75.75 0 0 0 .843 0c4.512-3.063 8.63-6.707 8.578-11.832-.025-2.469-1.983-4.538-4.456-4.538Z"></path>
</svg>`;
    const iconsolid = '<svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">' +
    '<path d="m12 21-.421-.281c-2.006-1.34-4.543-2.853-6.422-5.078-1.98-2.344-2.93-4.75-2.907-7.36C2.28 5.37 4.616 3 7.457 3c2.255 0 3.755 1.313 4.544 2.26.788-.947 2.287-2.26 4.543-2.26 2.841 0 5.177 2.37 5.206 5.28.027 2.61-.923 5.016-2.906 7.36-1.879 2.226-4.416 3.74-6.422 5.079l-.421.281Z"></path>' +
  '</svg>';

    var securtiu = meuBotao.getAttribute("data-value");

        if (securtiu == 0){
            meuBotao.style.backgroundColor = "var(--light)";
            hu.innerHTML = iconline ;
        } else {
            hu.innerHTML = iconsolid;
            meuBotao.style.backgroundColor = "var(--dark)";
            meuBotao.style.color = "var(--white)";
    }

    // Chama a função para fazer a consulta quando o botão é clicado
    meuBotao.addEventListener("click", mudaBtnStyle);
});

