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
