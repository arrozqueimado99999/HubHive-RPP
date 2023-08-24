document.addEventListener("DOMContentLoaded", function() {
    const meuBotao = document.getElementById("likeBtn");
    var securtiu = meuBotao.getAttribute("data-value");

        if (securtiu == 0){
            meuBotao.style.backgroundColor = "white";
        } else {
            meuBotao.style.backgroundColor = "var(--dark)";
            meuBotao.style.color = "var(--white)";

    }

    // Chama a função para fazer a consulta quando o botão é clicado
    meuBotao.addEventListener("click", mudaBtnStyle);
});
