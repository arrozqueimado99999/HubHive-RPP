function downloadFile(fileURL) {
    const fileName = "HubHive-download"
    // Realiza uma requisição fetch para obter o arquivo
    fetch(fileURL)
      .then(response => response.blob())
      .then(blob => {
        // Cria um objeto URL para o Blob
        const blobURL = URL.createObjectURL(blob);
  
        // Cria um link de download
        const a = document.createElement("a");
        a.href = blobURL;
        a.download = fileName;
  
        // Simula um clique no link para iniciar o download
        a.style.display = "none";
        document.body.appendChild(a);
        a.click();
  
        // Remove o link após o download
        document.body.removeChild(a);
  
        // Libera a URL do Blob
        URL.revokeObjectURL(blobURL);
      })
      .catch(error => {
        console.error("Erro ao fazer o download do arquivo: ", error);
      });
  }
  