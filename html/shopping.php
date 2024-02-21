<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="../js/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/422a850cff.js" crossorigin="anonymous"></script>
    <title>FleaMarket Shop</title>
</head>
<script type='text/javascript'>
$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
</script>
<body>
    <div class="contenedor">
        <header>
            <div class="logo">
                <a href="../index.html"><img src="../img/logo_sinfondo.png" width="150" alt=""></a>
            </div>

            <div class="titulo">
                <h1>Catálogo de productos</h1>
            </div>

            <div class="carrito">
                <a href="carrito.html"><img id="carrito_btn" src="../img/carrito.png" alt="carrito"></a>
            </div>
        </header>

        <nav>
            <a href="../index.html">Inicio</a>
            <a href="intermedia.html">Perfil</a>
            <a href="promociones.html">Promociones</a>
        </nav>
    </div>

    <div class='buscador'>
      <div class="etiqueta">

      </div>
        <div class="input_container">
            <i class="fas fa-search"></i>
            <input autocomplete="off" type="text" id="busqueda" onkeyup="autocompletar()" placeholder='¿Algún producto en especifico?' onfocus="focused()">
            <ul id="rieles_opc"></ul>
            <button type="button" name="" id="btn_search" onclick="buscar()">Buscar</button>
        </div>
    </div>
        <a href="#" id="scroll" title="Scroll to Top" style="display: none;">Top<span>TOP</span></a>
    <div id="principal" class="container flex">
      <?php
        include('../php/conexion.php');
        $conn = new conexion();
        $conn->shoes();
       ?>
    </div>
</body>
  <script src="../js/aut_complete.js" charset="utf-8"></script>
</html>
