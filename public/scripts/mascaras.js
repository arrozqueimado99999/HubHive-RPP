//mascara da maiuscula no nome do projeto
$(document).ready(function () {
    $('#telefone').inputmask('(99) 9999-9999');
  });

function capitalizarPrimeiraLetra() {
  let inputElement = document.getElementById('inputTitulo');
  let valor = inputElement.value;

  if (valor.length > 0) {
    // Capitaliza a primeira letra e mantém o restante em minúsculas
    valor = valor.charAt(0).toUpperCase() + valor.slice(1).toLowerCase();
  }

  inputElement.value = valor;
}
