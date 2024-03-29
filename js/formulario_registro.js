// Recorrer los elementos y hacer que onchange ejecute una funcion para comprobar el valor de ese input
(function () {

    var formulario = document.formulario_registro,
        elementos = formulario.elements;

    // Funcion que se ejecuta cuando el evento click es activado

    var validarInputs = function () {
        for (var i = 0; i < elementos.length; i++) {
            // Identificamos si el elemento es de tipo texto, email, password, radio o checkbox
            if (elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password") {
                // Si es tipo texto, email o password vamos a comprobar que esten completados los input
                if (elementos[i].value.length == 0) {
                    elementos[i].className = elementos[i].className + " error";
                    return false;
                } else {
                    elementos[i].className = elementos[i].className.replace(" error", "");
                }
            }
        }
        return true;
    };

    var validarCheckbox = function () {
        var opciones = document.getElementsByName('terminos'),
            resultado = false;

        for (var i = 0; i < elementos.length; i++) {
            if (elementos[i].type == "checkbox") {
                for (var o = 0; o < opciones.length; o++) {
                    if (opciones[o].checked) {
                        resultado = true;
                        break;
                    }
                }

                if (resultado == false) {
                    elementos[i].parentNode.className = elementos[i].parentNode.className + " error";
                    return false;
                } else {
                    // Eliminamos la clase Error del checkbox
                    elementos[i].parentNode.className = elementos[i].parentNode.className.replace(" error", "");
                    return true;
                }
            }
        }
    };

    var focusInput = function () {
        this.parentElement.children[1].className = "label active";
        this.parentElement.children[0].className = this.parentElement.children[0].className.replace("error", "");
    };

    var blurInput = function () {
        if (this.value <= 0) {
            this.parentElement.children[1].className = "label";
            this.parentElement.children[0].className = this.parentElement.children[0].className + " error";
        }
    };

    for (var i = 0; i < elementos.length; i++) {
        if (elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password") {
            elementos[i].addEventListener("focus", focusInput);
            elementos[i].addEventListener("blur", blurInput);
        }
    }

}());
