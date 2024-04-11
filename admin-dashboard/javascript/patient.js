const modal = document.getElementById('modal-wrapper');
const addButton = document.getElementById('add-record');
const closeX = document.getElementsByClassName('close')[0];
const cancelButton = document.getElementById('cancel-button');

addButton.onclick = function() {
    modal.style.display = 'block';
}

closeX.onclick = function() {
    modal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

cancelButton.onclick = function() {
    modal.style.display = 'none';
}