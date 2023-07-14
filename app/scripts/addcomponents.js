var contadorComponentes = 0;

function criarLink() {
    // Cria um novo elemento de parágrafo
    var novolink = document.createElement("input");
    
    // Define o conteúdo do parágrafo
    novolink.type = "text";
    novolink.name = "link";
    novolink.className = "search";
    
    // Adiciona o novo parágrafo ao elemento container no HTML
    var container = document.getElementById("linklist");
    container.appendChild(novolink);
  
    contadorComponentes++;
    const linklistBtn = document.getElementById('linklistBtn');
    linklistBtn.style.display = 'none';
}
