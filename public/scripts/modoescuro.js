// Função para definir o modo UI com base na preferência do usuário armazenada na sessionStorage
function setUIMode() {
  const root = document.documentElement;
  const mode = sessionStorage.getItem('uimode');

  if (mode === 'dark') {
    root.style.setProperty('--light', '#15171A');
    root.style.setProperty('--white', '#323437');
    root.style.setProperty('--dark', '#ffffff');
    root.style.setProperty('--mid', '#D1D3D6');
    root.style.setProperty('--hover', '#ffffff23');
    root.style.setProperty('--purple', '#c195ff');
    root.style.setProperty('--shadow', '#00000071');
  } else {
    // Defina os valores para o modo claro aqui
    root.style.setProperty('--light', "#f4f4f4");
    root.style.setProperty('--white', "#ffffff");
    root.style.setProperty('--dark', "#323437");
    root.style.setProperty('--mid', "#a1a1a1");
    root.style.setProperty('--hover', "#00000010");
    root.style.setProperty('--purple', "#9758ef");
    root.style.setProperty('--shadow', '#00000010');
  }
}

// Função para alternar entre os modos UI e salvar a preferência do usuário na sessionStorage
function toggleUIMode() {
  const mode = sessionStorage.getItem('uimode');
  if (mode === 'dark') {
    sessionStorage.setItem('uimode', 'light');
  } else if (mode === 'light' || !mode) { // Evita troca se o modo atual for desconhecido ou claro
    sessionStorage.setItem('uimode', 'dark');
  }
  setUIMode(); // Chama a função para atualizar o modo UI após a alteração
}

// Função para inicializar o modo UI com base na preferência do usuário ou padrão
function initializeUIMode() {
  const mode = sessionStorage.getItem('uimode');
  if (!mode) {
    sessionStorage.setItem('uimode', 'light'); // Define o modo padrão como claro
  }
  setUIMode(); // Define o modo UI com base na preferência atual do usuário
}

// Chame a função de inicialização quando o documento HTML estiver completamente pronto
document.addEventListener('DOMContentLoaded', initializeUIMode);
document.getElementById('changeuimode').addEventListener('click', toggleUIMode);
