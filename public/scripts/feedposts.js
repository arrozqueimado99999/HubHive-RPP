document.addEventListener('DOMContentLoaded', function() {
    // Função para criar o additionalContent com base nos dados recebidos
    function createAdditionalContent(legenda) {
      const additionalContent = document.createElement('div');
      additionalContent.className = 'postFeedInfo';
      additionalContent.innerHTML = `
        <p> ${legenda}</p>
      `;
      return additionalContent;
    }

    // Função para mostrar as informações adicionais quando o mouse estiver sobre o componente
    function showAdditionalContent(leg) {
    const dribbblePost = document.querySelector('.post');
    const additionalContent = createAdditionalContent(leg);
    dribbblePost.appendChild(additionalContent);
    }

    // Função para ocultar as informações adicionais quando o mouse sair do componente
    function hideAdditionalContent() {
      const dribbblePost = this;
      const additionalContent = dribbblePost.querySelector('.postFeedInfo');
      if (additionalContent) {
        dribbblePost.removeChild(additionalContent);
      }
    }

    // Obter o elemento do componente
    const dribbblePost = document.querySelector('.post');

    // Adicionar os eventos de mouseover e mouseout ao componente
    //dribbblePost.addEventListener('mouseover', showAdditionalContent);
    //dribbblePost.addEventListener('mouseout', hideAdditionalContent);
  });