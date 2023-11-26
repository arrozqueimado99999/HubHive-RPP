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
    
    btnp.className = "btnDivSelected";
    inputprojeto.value = idprojeto;
    var projectName = p.textContent;
    labelp.textContent = projectName;
    var modal = document.getElementById(pfechar);
    modal.style.display = "none"; 
    
    var btntirar = document.getElementById('tirarCole');
    btntirar.style.display = "flex";    
}

function addEixoInLabel(id, pfechar) {
    var btnpr = document.getElementById("btnEixoSelect");
    var labelpr = document.getElementById("eixoEscolhido");
    var inputprojetor = document.getElementById("inputeixo");
    var pr = document.getElementById("eixo" + id);
    var projetoEscolhidor = document.getElementById(id);
    var idprojetor = projetoEscolhidor.id;
    
    btnpr.className = "btnDivSelected";
    inputprojetor.value = idprojetor;
    var projectName = pr.textContent;
    labelpr.textContent = projectName;
    var modal = document.getElementById(pfechar);
    modal.style.display = "none";  
}

function addTagsInLabel(event) {
    // Verifica se a tecla pressionada foi "Enter"
    if (event.key === "Enter") {
        const digitTag = document.getElementById("inputDigitarTag");
        const inputTag = document.getElementById("inputTagsToPost");
        const divTags = document.getElementById("tagsListInPost");

        var tagDigitada = digitTag.value.trim(); // Remove espaços extras no início e no final
        if (tagDigitada !== "") {
            inputTag.value += (inputTag.value === "" ? "" : ", ") + tagDigitada; // Adiciona a tag ao conteúdo existente, separado por vírgula

            var newTag = document.createElement("span"); // Corrige o método createElement
            newTag.className = "tagBtn";
            newTag.innerHTML = tagDigitada;

            divTags.appendChild(newTag);

            // Limpa o campo de digitação após adicionar a tag
            digitTag.value = "";
        }
    }
}

// Adiciona um ouvinte de evento para chamar a função quando a tecla Enter for pressionada no campo de digitação
document.getElementById("inputDigitarTag").addEventListener("keypress", addTagsInLabel);

////////////////////////////////////////////////////////////////////////////// 

function limparColecao(){
  const divr = document.getElementById('btnProjectSelect');
  var value = document.getElementById('inputprojeto');
  var text = document.getElementById("projetoEscolhido");
  divr.className = "btnDivSelect";
  value.value = "";
  text.innerHTML = "Salvar na coleção";

  const btntirar = document.getElementById("tirarCole");
  btntirar.style.display = "none"; 
}

function limparEixo(){
  const divr = document.getElementById('btnEixoSelect');
  var value = document.getElementById('inputeixo');
  var text = document.getElementById("eixoEscolhido");
  divr.className = "btnDivSelect";
  value.value = "";
  text.innerHTML = "Adicionar no eixo";

  const btntirar = document.getElementById("tirarEixo");
  btntirar.style.display = "none"; 
}

function loadPDF(pdfPath, titulo) {
    // Caminho para o arquivo PDF
    var url = pdfPath;

    // Elemento HTML para renderizar o PDF
    var container = document.getElementById('artigoViewer');
    const tituloArtigo = document.getElementById('tituloArtigo');
    tituloArtigo.innerHTML = titulo;

    // Carrega o PDF usando PDF.js
    pdfjsLib.getDocument(url).promise.then(function(pdfDoc) {
        // Loop através de todas as páginas do PDF
        for (var pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
            // Cria um elemento para cada página
            var pageElement = document.createElement('canvas');
            container.appendChild(pageElement);

            // Renderiza a página atual
            pdfDoc.getPage(pageNum).then(function(page) {
                var viewport = page.getViewport({ scale: 1.5 });
                pageElement.height = viewport.height;
                pageElement.width = viewport.width;

                var renderContext = {
                    canvasContext: pageElement.getContext('2d'),
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }
    });
}