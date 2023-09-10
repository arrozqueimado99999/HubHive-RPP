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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addCategInLabel(id, pfechar) {
    var btn = document.getElementById("btnAddCateg");
    var label = document.getElementById("categoriaEscolhida");
    var inputcateg = document.getElementById("inputCategoria");
    var categEscolhido = document.getElementById(id);
    var idcateg = categEscolhido.id;

    btn.className = "btn_dark_selected";
    inputcateg.value = idcateg; // Corrigido: atribuição usando "=" ao invés de "()"
    var categName = categEscolhido.textContent;
    label.textContent = categName; // Corrigido: atribuição usando "=" ao invés de "()"

    var modal = document.getElementById(pfechar);
    modal.style.display = "none";  
}

function addOrientInLabel(id, pfechar) {
    var btno = document.getElementById("btnAddOrient");
    var labelo = document.getElementById("orientadorEscolhido");
    var inputorient = document.getElementById("inputOrient");
    var g = document.getElementById("nome" + id);
    var orientEscolhido = document.getElementById(id);
    var idorient = orientEscolhido.id;
    
    btno.className = "btn_dark_selected";
    inputorient.value = idorient; 
    var orientName = g.textContent;
    labelo.textContent = orientName; 
    var modal = document.getElementById(pfechar);
    modal.style.display = "none";  
}

function addProjetoInLabel(id, pfechar) {
    var btnp = document.getElementById("btnProjectSelect");
    var labelp = document.getElementById("projetoEscolhido");
    var inputprojeto = document.getElementById("inputprojeto");
    var p = document.getElementById("projeto" + id);
    var projetoEscolhido = document.getElementById(id);
    var idprojeto = projetoEscolhido.id;
    
    btnp.className = "btn_dark_selected";
    inputprojeto.value = idprojeto;
    var projectName = p.textContent;
    labelp.textContent = projectName;
    var modal = document.getElementById(pfechar);
    modal.style.display = "none";  
}


