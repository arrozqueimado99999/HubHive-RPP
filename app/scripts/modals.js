function openModal(id) {
    var modal = document.getElementById(id);
    modal.style.display = "flex";
    modal.style.flexDirection = "column";
    modal.style.justifyContent = "center";  
}

function closeModal(id) {
    var modal = document.getElementById(id);
    modal.style.display = "none";  
}

//_________________________________________________________________________________________________________

const inputElement = document.getElementById('file');

    inputElement.addEventListener('change', function(event) {
        // Aqui você irá manipular o evento de alteração do arquivo
        const file = event.target.files[0];
    
        const imagem = new Image();
        imagem.src = URL.createObjectURL(file);

        const formimg = document.getElementById("formimg");
        formimg.style.display = "none";  
    
        const meuComponente = document.getElementById('imgchange');
        meuComponente.innerHTML = ''; // Limpa o conteúdo atual do componente
        meuComponente.appendChild(imagem); // Adiciona a imagem ao componente
      });


//_________________________________________________________________________________________________________


const inputBanner = document.getElementById('inputbanner');

inputBanner.addEventListener('change', function(event) {
        // Aqui você irá manipular o evento de alteração do arquivo
        const fileBanner = event.target.files[0];
    
        const banner = new Image();
        banner.src = URL.createObjectURL(fileBanner);

        const formbanner = document.getElementById("formbanner");
        formbanner.style.display = "none";  
    
        const bannerComponent = document.getElementById('bannerimgchange');
        bannerComponent.innerHTML = ''; // Limpa o conteúdo atual do componente
        bannerComponent.appendChild(banner); // Adiciona a imagem ao componente
      });

//_________________________________________________________________________________________________________
const inputPost = document.getElementById('postAnexo');

inputPost.addEventListener('change', function(event) {
    // Aqui você irá manipular o evento de alteração do arquivo
    const filePost = event.target.files[0];

    const postanexo = new Image();
    postanexo.src = URL.createObjectURL(filePost);

    const postan = document.getElementById("imgPost");
    postan.style.display = "none";  

    const meuPost = document.getElementById('imgPost');
    meuPost.innerHTML = ''; // Limpa o conteúdo atual do componente
    meuPost.appendChild(postanexo); // Adiciona a imagem ao componente
  });