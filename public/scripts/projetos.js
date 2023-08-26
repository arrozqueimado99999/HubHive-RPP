const inputTitulo = document.getElementById("inputTitulo");
const inputCategoria = document.getElementById("inputCategoria");
const inputDesc = document.getElementById("inputDesc");
const submitButton = document.getElementById("submitFormNewProjeto");

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
