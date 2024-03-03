var modificar = document.getElementById("mod");
if (modificar.addEventListener) {
    modificar.addEventListener("click", modificarDatos, false);
} else if (modificar.attachEvent) {
    modificar.attachEvent("onclick", modificarDatos);
}

var modificar2 = document.getElementById("mod2");
if (modificar2.addEventListener) {
    modificar2.addEventListener("click", modificarDatos, false);
} else if (modificar2.attachEvent) {
    modificar2.attachEvent("onclick", modificarDatos);
}

function modificarDatos() {
    window.location.href = 'modificar.php';
}
