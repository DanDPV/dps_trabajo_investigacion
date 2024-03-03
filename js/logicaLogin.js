function validarCredenciales(usuario, contraseña) {
    var listaUsuarios = getListaUsuarios();
    var bAcceso = false;
    for (var i = 0; i < listaUsuarios.length; i++) {
        if ((usuario == listaUsuarios[i]["usuario"] || usuario == listaUsuarios[i]["correo"]) & contraseña == listaUsuarios[i]["contraseña"]) {
            bAcceso = true;
            sessionStorage.setItem('usuarioDui', listaUsuarios[i]["dui"]);
            sessionStorage.setItem('usuarioNombre', listaUsuarios[i]["nombres"]);
            sessionStorage.setItem('usuarioApellido', listaUsuarios[i]["apellidos"]);
            sessionStorage.setItem('usuarioCorreo', listaUsuarios[i]["correo"]);
            sessionStorage.setItem('usuario', listaUsuarios[i]["usuario"]);
            sessionStorage.setItem('usuarioContra', listaUsuarios[i]["contraseña"]);
            sessionStorage.setItem('usuarioTelefono', listaUsuarios[i]["telefono"]);
            sessionStorage.setItem('usuarioAvatar', listaUsuarios[i]["avatar"]);
            sessionStorage.setItem('usuarioRol', listaUsuarios[i]["rol"]);

            var dui = sessionStorage.getItem('usuarioDui');
            var nombre = sessionStorage.getItem('usuarioNombre');
            var apellido = sessionStorage.getItem('usuarioApellido');
            var correo = sessionStorage.getItem('usuarioCorreo');
            var usuario = sessionStorage.getItem('usuario');
            var contra = sessionStorage.getItem('usuarioContra');
            var confirm_contra = sessionStorage.getItem('usuarioContra');
            var telefono = sessionStorage.getItem('usuarioTelefono');
            var avatar = sessionStorage.getItem('usuarioAvatar');

        }
    }

    return bAcceso;
}
