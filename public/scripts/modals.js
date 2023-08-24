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
    modal.style.display = "block";
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
    modalProfile.style.marginTop = "20px";
    modalProfile.style.display = "block";
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
