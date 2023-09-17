const inputTitulo = document.getElementById("inputTitulo");
const inputCategoria = document.getElementById("inputCategoria");
const inputDesc = document.getElementById("inputDesc");
const submitButton = document.getElementById("submitFormNewProjeto");

if (inputTitulo && inputCategoria && inputDesc && submitButton) {
    function checkInputs() {
        if (
            inputTitulo.value.trim() !== "" &&
            inputCategoria.value.trim() !== "" &&
            inputDesc.value.trim() !== ""
        ) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    inputTitulo.addEventListener("input", checkInputs);
    inputCategoria.addEventListener("input", checkInputs);
    inputDesc.addEventListener("input", checkInputs);
}

const inputNomeColecao = document.getElementById("inputNomeColecao");
const submitFormNewColecao = document.getElementById("submitFormNewColecao");

if (inputNomeColecao && submitFormNewColecao) {
    function checkInputcolecao() {
        if (inputNomeColecao.value.trim() !== "") {
            submitFormNewColecao.disabled = false;
        } else {
            submitFormNewColecao.disabled = true;
        }
    }

    inputNomeColecao.addEventListener("input", checkInputcolecao);
}

const inputProjetoToPost = document.getElementById("inputcolecao");
const postanexo = document.getElementById("postanexo");
const inputLegenda = document.getElementById("legendaPost");
const submitFormNewPost = document.getElementById("submitFormNewPost");

if (inputProjetoToPost && postanexo && inputLegenda && submitFormNewPost) {
    function checkInputPost() {
        if (
            inputProjetoToPost.value.trim() !== "" &&
            postanexo.value.trim() !== "" &&
            inputLegenda.value.trim() !== ""
        ) {
            submitFormNewPost.disabled = false;
        } else {
            submitFormNewPost.disabled = true;
        }
    }

    inputProjetoToPost.addEventListener("input", checkInputPost);
    postanexo.addEventListener("input", checkInputPost);
    inputLegenda.addEventListener("input", checkInputPost);
}
