const inputElement = document.getElementById('profileEditImg');
if (inputElement) {
  inputElement.addEventListener('change', function(event) {
    const file = event.target.files[0];
    const imagem = new Image();
    imagem.src = URL.createObjectURL(file);
    const formimg = document.getElementById("formimg");
    if (formimg) {
      formimg.style.display = "none";
    }
    const meuComponente = document.getElementById('imgchange');
    if (meuComponente) {
      meuComponente.innerHTML = '';
      meuComponente.appendChild(imagem);
    }
  });
}

const inputBanner = document.getElementById('inputbanner');
if (inputBanner) {
  inputBanner.addEventListener('change', function(event) {
    const fileBanner = event.target.files[0];
    const banner = new Image();
    banner.src = URL.createObjectURL(fileBanner);
    const formbanner = document.getElementById("formbanner");
    if (formbanner) {
      formbanner.style.display = "none";
    }
    const bannerComponent = document.getElementById('bannerimgchange');
    if (bannerComponent) {
      bannerComponent.innerHTML = '';
      bannerComponent.appendChild(banner);
    }
  });
}

const inputImg = document.getElementById('inputAddInGaleria');
const formaddingaleria = document.getElementById('labelInputImg');
if (inputImg) {
  inputImg.addEventListener('change', function(event) {
    const fileImg = event.target.files[0];
    const imgSrc = new Image();
    imgSrc.src = URL.createObjectURL(fileImg);
    if (formaddingaleria) {
        formaddingaleria.innerHTML = "";
    }
    const bannerImgToGaleria = document.createElement('div');
    bannerImgToGaleria.className = 'imgtoadd';
    if (bannerImgToGaleria) {
      formaddingaleria.innerHTML = '';
      bannerImgToGaleria.appendChild(imgSrc);
      formaddingaleria.appendChild(bannerImgToGaleria);
    }
  });
}

// Adicione um loop para iterar pelos elementos com IDs incrementados
for (let i = 1; i <= 999; i++) {
  const inputImg = document.getElementById(`inputAddInGaleria${i}`);
  const form = document.getElementById(`formaddingaleria${i}`);

  // Verifica se os elementos com IDs existem
  if (inputImg && form) {
    inputImg.addEventListener('change', function(event) {
      const fileImg = event.target.files[0];

      // Verifica se um arquivo foi selecionado
      if (fileImg) {
        // Envie o formulário
        form.submit();
      }
    });
  }
}

function validaTamanhoArquivo() {
  var input = document.getElementById('postanexo');
  if (input.files.length > 0) {
      var tamanho = input.files[0].size;
      var tamanhoLimite = 5242880;

      if (tamanho > tamanhoLimite) {
        criaralert('block', 'O tamanho máximo é de 5MB');
          return false;
      }
  }
  return true;
}

document.getElementById('postanexo').addEventListener('change', function () {
  validaTamanhoArquivo();
});