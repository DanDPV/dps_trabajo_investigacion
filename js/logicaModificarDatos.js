var imgElem = document.getElementById('avatar');
var imageForm = document.getElementById('image');

function populateStorage() {
    localStorage.setItem('imagen_modificar', document.getElementById('image').value);

    setStyles();
}

function setStyles() {
    var currentImage = localStorage.getItem('imagen_modificar');
    var idea = "../" + localStorage.getItem('imagen_modificar');
    document.getElementById('image').value = currentImage;

    imgElem.setAttribute('src', idea);
}
imageForm.onchange = populateStorage;
