function response(id, x) {
    var obj = document.getElementById(id);
    if (x.matches) {
        obj.style.display = "none";
    } else {
        obj.style.display = "block"; // Se a consulta de mídia não corresponder, exiba o elemento.
    }
}

var x = window.matchMedia("(max-width: 700px)");
response("imgbeeanimated1", x); // Chamada à função para configurar o estado inicial.

x.addListener(function (x) {
    response("imgbeeanimated1", x); // Adicione um ouvinte para atualizar o estado quando a consulta de mídia for alterada.
});
