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

function criarSecao() {
    // Cria um novo elemento de parágrafo
    var novaSecao = document.createElement("input");
    var btnSendSecao = document.createElement("button");
    var formNewSecao = document.getElementById("formNewSecao");
    
    // Define o conteúdo do parágrafo
    btnSendSecao.className = 'btnNovaSecao';
    btnSendSecao.innerHTML = '<h2>></h2>';
    novaSecao.required = "required";
    novaSecao.type = "text";
    novaSecao.name = "secao";
    novaSecao.className = "inputSecaoCriar";
    formNewSecao.className = "formNewSecao";

    formNewSecao.appendChild(novaSecao);
    formNewSecao.appendChild(btnSendSecao);
    
    // Adiciona o novo parágrafo ao elemento container no HTML
    var containerr = document.getElementById("inputaddsecao");
    containerr.appendChild(formNewSecao);

}

const pngback = document.getElementById('imgpost');
pngback.style.background = 'url(/public/imgs/png_background.png)';

////////////////////////////////////////////////////////////////////////////////////////////////////////////

function optsection(){
    var ff = document.getElementsByClassName("optsectionlist");
    var bb = document.createElement("a");
    var cc = document.createElement("a");

    cc.innerHTML = "<p>cu</p>";
    bb.innerHTML = "<p>cu</p>";

    ff.display = "block";
}
