const inputElement = document.getElementById('file');
    inputElement.addEventListener('change', function(event) {
        const file = event.target.files[0];    

        const imagem = new Image();
        imagem.src = URL.createObjectURL(file);

        const formimg = document.getElementById("formimg");
        formimg.style.display = "none";  

        const meuComponente = document.getElementById('imgchange');
        meuComponente.innerHTML = '';
        meuComponente.appendChild(imagem);
    });

const inputBanner = document.getElementById('inputbanner');
        inputBanner.addEventListener('change', function(event) {
        const fileBanner = event.target.files[0];  

        const banner = new Image();
        banner.src = URL.createObjectURL(fileBanner);

        const formbanner = document.getElementById("formbanner");
        formbanner.style.display = "none";      

        const bannerComponent = document.getElementById('bannerimgchange');
        bannerComponent.innerHTML = ''; 
        bannerComponent.appendChild(banner);
    });

const inputPost = document.getElementById('postAnexo');
    inputPost.addEventListener('change', function(event) {
        const filePost = event.target.files[0];

        const postanexo = new Image();
        postanexo.src = URL.createObjectURL(filePost);

        //const postan = document.getElementById("imgPost");
        //postan.style.display = "none"; 

        const meuPost = document.getElementById('dropArea');
        meuPost.innerHTML = '';
        meuPost.appendChild(postanexo);
    });