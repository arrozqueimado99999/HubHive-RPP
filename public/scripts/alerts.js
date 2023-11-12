function criaralert(iconType, texto) {
    const divAlert = document.createElement('div');
    divAlert.className = 'alert';

    var icon = `<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm0 18a8 8 0 1 1 0-16.001A8 8 0 0 1 12 20Z"></path>
    <path d="M12 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"></path>
    <path d="M12 10a1 1 0 0 0-1 1v5a1 1 0 0 0 2 0v-5a1 1 0 0 0-1-1Z"></path>
  </svg>`;

    if (iconType=="block"){
        var icon = `<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm8 10a7.92 7.92 0 0 1-1.69 4.9L7.1 5.69A7.92 7.92 0 0 1 12 4a8 8 0 0 1 8 8ZM4 12a7.92 7.92 0 0 1 1.69-4.9L16.9 18.31A7.92 7.92 0 0 1 12 20a8 8 0 0 1-8-8Z"></path>
      </svg>`;
    } else if (iconType=="atencao"){
        var icon = `<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="m22.56 16.303-7.67-12.72a3.43 3.43 0 0 0-5.78 0l-7.67 12.72a3 3 0 0 0-.05 3 3.37 3.37 0 0 0 2.94 1.7h15.34a3.37 3.37 0 0 0 2.94-1.66 3 3 0 0 0-.05-3.04Zm-1.7 2.05a1.31 1.31 0 0 1-1.19.65H4.33a1.31 1.31 0 0 1-1.19-.65 1 1 0 0 1 0-1l7.68-12.73a1.48 1.48 0 0 1 2.36 0l7.67 12.72a1 1 0 0 1 .01 1.01Z"></path>
        <path d="M12 17a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"></path>
        <path d="M12 8a1 1 0 0 0-1 1v4a1 1 0 0 0 2 0V9a1 1 0 0 0-1-1Z"></path>
      </svg>`;
    } else if (iconType =="confirm") {
        var icon = `<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm0 18a8 8 0 1 1 0-16.001A8 8 0 0 1 12 20Z"></path>
        <path d="m14.7 8.388-3.78 5-1.63-2.11a1.002 1.002 0 0 0-1.58 1.23l2.43 3.11a1 1 0 0 0 1.23.277 1 1 0 0 0 .35-.287l4.57-6a1.006 1.006 0 0 0-1.6-1.22h.01Z"></path>
      </svg>`;

    } else if (iconType=="clipboard"){
      var icon = `<svg width="22" height="22" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"></path>
      <path d="m9 14 2 2 4-4"></path>
      <path d="M9.586 6.414A2 2 0 0 1 11 3h2a2 2 0 0 1 0 4h-2a2 2 0 0 1-1.414-.586Z"></path>
    </svg>`
    }

    divAlert.innerHTML = icon + texto;
    
    document.body.appendChild(divAlert);
    
    function esconderAlerta() {
        divAlert.style.display = 'none';
    }
    
    setTimeout(esconderAlerta, 3000);
}

function contarCaracteres() {
  const textarea = document.getElementById('textNote');
  const contador = document.getElementById('contador');
  const limite = 150;
  const texto = textarea.value;
  const caracteresRestantes = limite - texto.length;
  contador.style.color = "var(--dark)";

  if (caracteresRestantes < 0) {
      criaralert("atencao", "Máximo de 150 caracteres");
      contador.style.color = "red";
      textarea.value = texto.substring(0, limite);
      caracteresRestantes = 0;
  }

  contador.textContent = `${texto.length}/${limite}`;
}
