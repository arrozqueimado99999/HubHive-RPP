const inputEditNome = document.getElementById("EditProfnome");
const profileEditImg = document.getElementById("profileEditImg");
const inputEditUsuario = document.getElementById("EditProfuser");
const inputEditEmail = document.getElementById("EditProfemail");
const inputTitulo = document.getElementById("inputTitulo");
const inputCategoria = document.getElementById("inputCategoria");
const inputDesc = document.getElementById("inputDesc");
const submitEditButton = document.getElementById("btnEditProfile");
const submitButton = document.getElementById("submitFormNewProjeto");

// Armazena os valores iniciais dos campos de entrada
const initialValues = {
    inputEditNome: inputEditNome.value.trim(),
    profileEditImg: profileEditImg.value.trim(),
    inputEditUsuario: inputEditUsuario.value.trim(),
    inputEditEmail: inputEditEmail.value.trim()
};

function checkInputs() {
    const currentValues = {
        inputEditNome: inputEditNome.value.trim(),
        profileEditImg: profileEditImg.value.trim(),
        inputEditUsuario: inputEditUsuario.value.trim(),
        inputEditEmail: inputEditEmail.value.trim()
    };

    // Verifica se pelo menos um campo não está vazio e se os valores são diferentes dos valores iniciais
    if (
        (currentValues.profileEditImg !== "" && currentValues.profileEditImg !== initialValues.profileEditImg) ||
        (currentValues.inputEditNome !== "" && currentValues.inputEditNome !== initialValues.inputEditNome) ||
        (currentValues.inputEditUsuario !== "" && currentValues.inputEditUsuario !== initialValues.inputEditUsuario) ||
        (currentValues.inputEditEmail !== "" && currentValues.inputEditEmail !== initialValues.inputEditEmail)
    ) {
        submitEditButton.disabled = false;
    } else {
        submitEditButton.disabled = true;
    }
}

// Adiciona o ouvinte de evento para cada campo de entrada
inputEditNome.addEventListener("input", checkInputs);
inputEditUsuario.addEventListener("input", checkInputs);
inputEditEmail.addEventListener("input", checkInputs);
profileEditImg.addEventListener("input", checkInputs); // Adiciona o evento para o input profileEditImg


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
