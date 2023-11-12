    const post = document.getElementById("postanexo");
        post.addEventListener('change', function(event) {
        const filePost = event.target.files[0];

        const postanexo = new Image();
        postanexo.src = URL.createObjectURL(filePost); 

        const meuPost = document.getElementById("droparea");
        meuPost.innerHTML = '';
        meuPost.appendChild(postanexo);
    });




// Estilize e exiba o código na div
var codigoDiv = document.getElementById('codigo');
codigoDiv.innerHTML = `<pre><code class="language-javascript">${codigoFonte}</code></pre>`;
Prism.highlightAll();

function mostrarCodigo(codigo) {
    var divCodigo = document.getElementById("div-codigo");
    var codigoFormatado = "<pre><code>" + codigo + "</code></pre>";
    divCodigo.innerHTML = codigoFormatado;
  }