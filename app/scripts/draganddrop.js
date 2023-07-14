// Referência aos elementos HTML
const dropArea = document.getElementById('dropArea');
const fileInput = document.getElementById('postAnexo');

// Manipuladores de eventos para a área de arrastar e soltar
dropArea.addEventListener('dragover', handleDragOver);
dropArea.addEventListener('dragenter', handleDragEnter);
dropArea.addEventListener('dragleave', handleDragLeave);
dropArea.addEventListener('drop', handleDrop);

// Função para evitar o comportamento padrão do navegador
function preventDefaultBehavior(event) {
    event.preventDefault();
    event.stopPropagation();
  }
  
  // Manipulador de evento para arrastar o arquivo sobre a área
  function handleDragOver(event) {
    preventDefaultBehavior(event);
    dropArea.classList.add('drag-over');
  }
  
  // Manipulador de evento para entrar na área arrastando o arquivo
  function handleDragEnter(event) {
    preventDefaultBehavior(event);
    dropArea.classList.add('drag-over');
  }
  
  // Manipulador de evento para sair da área arrastando o arquivo
  function handleDragLeave(event) {
    preventDefaultBehavior(event);
    dropArea.classList.remove('drag-over');
  }
  
  // Manipulador de evento para soltar o arquivo na área
  function handleDrop(event) {
    preventDefaultBehavior(event);
    dropArea.classList.remove('drag-over');
  
    // Obtém os arquivos arrastados
    const files = event.dataTransfer.files;
    
    // Processa os arquivos
    processFiles(files);
  }
  
