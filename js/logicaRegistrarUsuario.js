
function setStyles() {
    var currentImage = localStorage.getItem('image');

    document.getElementById('image').value = currentImage;

    imgElem.setAttribute('src', currentImage);
}
