var btnLogin = document.getElementById("btnLogin");
var btnRegister = document.getElementById("btnRegister");

if (btnLogin.addEventListener) {
    btnLogin.addEventListener("click", function () {
        openCity(event, "contenedor_login")
    }, false);
} else if (btnLogin.attachEvent) {
    btnLogin.attachEvent("onclick", function () {
        openCity(event, "contenedor_login")
    });
}

if (btnRegister.addEventListener) {
    btnRegister.addEventListener("click", function () {
        openCity(event, "contenedor_registro")
    }, false);
} else if (btnRegister.attachEvent) {
    btnRegister.attachEvent("onclick", function () {
        openCity(event, "contenedor_registro")
    });
}


function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("btnLogin").click();
