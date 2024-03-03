class cliente {
    constructor(dui, nombres, apellidos, correo, usuario, contra, confirm_password, telefono, avatar) {
        this.dui = dui;
        this.nombres = nombres;
        this.apellidos = apellidos;
        this.correo = correo;
        this.usuario = usuario;
        this.contra = contra;
        this.confirm_password = confirm_password;
        this.telefono = telefono;
        this.avatar = avatar;

        /*FUNCIÓN PARA REGISTRAR UN NUEVO USUARIO*/
        this.registrar = function (terminos) {
            var valido = 0;
            /*Validamos que ningún campo esté vacío*/
            if (this.nombres == "" || this.apellidos == "" || this.correo == "" || this.usuario == "" || this.contra == "" ||
                this.confirm_password == "" || this.telefono == "" || this.dui == "" || this.avatar == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Atención',
                    text: 'Debes completar todos los campos del formulario',
                });
            } else {
                valido++; //valido == 1
                if (!terminos) {
                    Swal.fire({
                        type: 'warning',
                        title: 'Atención',
                        text: 'Debes aceptar los términos y condiciones',
                    });
                } else {
                    valido++; //valido == 2
                    /*Validamos el formato de correo*/
                    var re_correo = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
                    if (re_correo.test(correo)) {
                        valido++; // valido == 3
                        /*Validamos el formato de contraseña*/
                        var re_contra = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/;
                        if (re_contra.test(contra)) {
                            valido++; //valido == 4
                            /*Validamos que las contraseñas coincidan*/
                            if (contra == confirm_password) {
                                valido++; //valido == 5
                                /*Validamos el formato de teléfono*/
                                var re_telefono = /^([2]*|[6]*|[7]*)\d{3}-\d{4}$/;
                                if (re_telefono.test(telefono)) {
                                    valido++; //valido == 6
                                    /*Validamos el formato de DUI*/
                                    var re_dui = /^\d{8}-\d{1}$/;
                                    if (re_dui.test(dui)) {
                                        valido++; //valido == 7
                                    } else {
                                        Swal.fire({
                                            type: 'error',
                                            title: 'Error',
                                            text: 'Formato de DUI incorrecto',
                                        });
                                    }
                                } else {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Error',
                                        text: 'Formato de teléfono incorrecto',
                                    });
                                }
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Error',
                                    text: 'Las contraseñas no coinciden',
                                });
                            }
                        } else {
                            Swal.fire({
                                type: 'info',
                                title: 'Formato de contraseña',
                                text: 'La contraseña debe tener al menos una letra en mayúscula, al menos una letra en minúscula, al menos un símbolo, al menos un dígito y debe tener una longitud mínima de 8 caracteres',
                            });
                        }
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'El correo electrónico no es válido',
                        });
                    }
                }

            }
            if (valido == 7) {
                var rol;
                if (usuario == "daniel" || usuario == "alejandro" || usuario == "gilberto.duran") {
                    rol = 1;
                } else {
                    rol = 2;
                }
                agregarUsuario(dui, nombres, apellidos, correo, usuario, contra, telefono, avatar, rol);
                limpiarForm();
                getListaUsuarios();
            }
        }

        /*FUNCIÓN PARA MODIFICAR LOS DATOS DEL USUARIO*/
        this.modifcarDatos = function (dui, nombres, apellidos, usuario, telefono, avatar) {
            var listaUsuarios = getListaUsuarios();
            var valido = 0;
            for (var i = 0; i < listaUsuarios.length; i++) {
                if ((dui == listaUsuarios[i]["dui"])) {
                    sessionStorage.setItem('usuarioNombre', nombres);
                    sessionStorage.setItem('usuarioApellido', apellidos);
                    sessionStorage.setItem('usuario', usuario);
                    sessionStorage.setItem('usuarioTelefono', telefono);
                    sessionStorage.setItem('usuarioAvatar', avatar);
                    listaUsuarios[i]["nombres"] = nombres;
                    listaUsuarios[i]["apellidos"] = apellidos;
                    listaUsuarios[i]["usuario"] = usuario;
                    listaUsuarios[i]["telefono"] = telefono;
                    listaUsuarios[i]["avatar"] = avatar;
                }
            }
            var re_telefono = /^([2]*|[6]*|[7]*)\d{3}-\d{4}$/;
            if (re_telefono.test(telefono)) {
                valido++; //valido == 1
            }
            if (valido == 1) {
                localStorageListaUsuario(listaUsuarios);
                Swal.fire({
                    type: 'success',
                    title: 'Usuario actualizado',
                    text: 'Datos guardados correctamente',
                    showConfirmButton: false,
                    timer: 2000
                });
                window.setTimeout("cambiarVentana()", 2100);
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Formato de teléfono incorrecto',
                });
            }

        }
    }
}

function cambiarVentana() {
    window.location.href = 'datos_usuario.html';
}


function getListaUsuarios() {
    var storeList = localStorage.getItem('localListaUsuarios')
    if (storeList == null) {
        ListaUsuarios = [
            {
                dui: "12345678-9",
                nombres: "daniel",
                apellidos: "de paz",
                correo: "daniel@gmail.com",
                usuario: "daniel",
                contraseña: "Ravencl@w17",
                telefono: "2222-2222",
                avatar: "img/ninja.png",
                rol: 1
        },
            {
                dui: "12345678-9",
                nombres: "alejandro",
                apellidos: "alas",
                correo: "alenjandro@gmail.com",
                usuario: "alenjandro",
                contraseña: "@lenjandro",
                telefono: "2222-2222",
                avatar: "img/peliroja.png",
                rol: 1
        },
            {
                dui: "98765432-1",
                nombres: "Gilberto",
                apellidos: "Durán",
                correo: "gilberto.duran@gmail.com",
                usuario: "gilberto.duran",
                contraseña: "Gilberto@17",
                telefono: "2222-2222",
                avatar: "img/mesero.png",
                rol: 1
        }];
        localStorageListaUsuario(ListaUsuarios);
    } else {
        ListaUsuarios = JSON.parse(storeList);
    }
    return ListaUsuarios;
}

function localStorageListaUsuario(plist) {
    localStorage.setItem('localListaUsuarios', JSON.stringify(plist));
}
