var btnAcceder = document.getElementById("btnAcceder");

function iniciarSesion() {
    var usuario = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var bAcceso = false;

    if (bAcceso = validarCredenciales(usuario, password)) {
        ingresar();
    } else {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Usuario o contraseña incorrecta',
        });
    }
}

function ingresar() {
    window.location.href = 'html/inicio.html';
    document.getElementById("formulario_login").reset();
}
