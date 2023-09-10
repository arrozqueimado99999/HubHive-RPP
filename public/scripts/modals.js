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

function openSecaoOptModal(uu){
    var modal = document.getElementsByClassName(uu);
    modal.style.display = "flex";
    modal.style.flexDirection = "column";
    modal.style.justifyContent = "center";  
}

const openModalButton = document.getElementById("openModalOptPost");
const modal = document.getElementById("modalOptPost");
const openProfileModal = document.getElementById("openModalProfile");
const modalProfile = document.getElementById("modalProfile");

function openModalLado() {
    const buttonRect = openModalButton.getBoundingClientRect();
    modal.style.left = buttonRect.left + "px";
    modal.style.top = buttonRect.bottom + "px";
    modal.style.marginTop = "20px";
    modal.style.display = "flex";
}

if (openModalButton) {
    openModalButton.addEventListener("click", openModalLado);
}

if (modal && openModalButton) {
    window.addEventListener("click", function(event) {
        if (event.target !== openModalButton && event.target !== modal) {
            modal.style.display = "none";
        }
    });
}

function openModalProfile() {
    const buttonRect = openProfileModal.getBoundingClientRect();
    modalProfile.style.width = buttonRect.width + "px";
    modalProfile.style.left = buttonRect.left + "px";
    modalProfile.style.top = buttonRect.bottom + "px";
    modalProfile.style.marginTop = "var(--pad)";
    modalProfile.style.display = "flex";
}

if (openProfileModal) {
    openProfileModal.addEventListener("click", function(event) {
        event.stopPropagation();
        openModalProfile();
    });

    window.addEventListener("click", function(event) {
        if (event.target !== openProfileModal && event.target !== modalProfile) {
            modalProfile.style.display = "none";
        }
    });
}

const openModalSaveButton = document.getElementById("saveBtn");
const modalsave = document.getElementById("modalSavePost");

function openModalSavePost() {
    const buttonRecta = openModalSaveButton.getBoundingClientRect();
    modalsave.style.left = buttonRecta.left + "px";
    modalsave.style.top = buttonRecta.bottom + "px";
    modalsave.style.marginTop = "var(--pad)";
    modalsave.style.display = "flex";
}

if (modalsave && openModalSaveButton) {
    window.addEventListener("click", function(event) {
        if (event.target !== openModalSaveButton && event.target !== modalsave) {
            modalsave.style.display = "none";
        }
    });
}

function openModalLadoById(btnid, id) {
    const modalId = document.getElementById(id);
    const btnId = document.getElementById(btnid);
    const buttonAtb = btnId.getBoundingClientRect();

    // Fecha todas as modais que estão abertas
    const modaisAbertas = document.querySelectorAll('.modalOpt');
    modaisAbertas.forEach((modal) => {
        if (modal !== modalId && modal.style.display === 'flex') {
            modal.style.display = 'none';
        }
    });

    if (modalId.style.display === "flex") {
        modalId.style.display = "none";
    } else {
        modalId.style.left = buttonAtb.left + "px";
        modalId.style.top = buttonAtb.bottom + window.scrollY + "px"; // Adicionando a posição atual de rolagem
        modalId.style.marginTop = "var(--pad)";
        modalId.style.display = "flex";
    }
}

function fecharModalAoClicarFora() {
    const modais = document.querySelectorAll('.modalOpt');
    modais.forEach((modal) => {
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
}

fecharModalAoClicarFora();