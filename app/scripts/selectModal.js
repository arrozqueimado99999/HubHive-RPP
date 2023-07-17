const modal = document.getElementById('selectmodal');
const selectedItem = document.getElementById('selectedItem');
const openModalButton = document.getElementById('openSelectModal');

// Abrir modal ao clicar no botão
openModalButton.addEventListener('click', () => {
  modal.style.display = 'block';
});

// Fechar modal ao clicar fora da área
window.addEventListener('click', (event) => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});

// Selecionar item ao clicar em uma div da grade
modal.addEventListener('click', (event) => {
  const selectedValue = event.target.textContent;
  selectedItem.value = selectedValue;
  modal.style.display = 'none';
});
