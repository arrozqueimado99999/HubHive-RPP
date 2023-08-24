    const post = document.getElementById("postanexo");
        post.addEventListener('change', function(event) {
        const filePost = event.target.files[0];

        const postanexo = new Image();
        postanexo.src = URL.createObjectURL(filePost); 

        const meuPost = document.getElementById("droparea");
        meuPost.innerHTML = '';
        meuPost.appendChild(postanexo);
    });