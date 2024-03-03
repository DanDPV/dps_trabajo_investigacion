<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Solo Rieles - Datos del usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/datos_usuario.css">
    <link rel="stylesheet" href="../pluggins/mensaje.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

    </div>
    <header>
        <a href="../inicio.html"><img src="../img/logo_sinfondo.png" width="150" alt=""></a>
        <h1>Datos del usuario</h1>
        <div>
            <button id="cerrar_sesion">Cerrar sesión</button>
        </div>
    </header>

    <nav>
        <a href="../inicio.html">Inicio</a>
        <a href="shopping.php">Sneakers</a>
        <a href="promociones.html">Promociones</a>
    </nav>
    <?php
    if(isset($_POST['usuario'])){
      $user=$_POST['usuario'];
    }
     ?>
    <div class="contenedor">
        <div class="imagen">
            <img id="avatar" src="../img/ninja.png">
            <button name="mod" id="mod">Modificar datos</button>
        </div>

        <div class="datos">
            <div class="datos-group">
                <h2 id="dui"><?php
                    echo $user;
                 ?></h2>
            </div>

            <div class="datos-group">
                <h2 id="nombres">Nombres:</h2>
            </div>

            <div class="datos-group">
                <h2 id="apellidos">Apellidos:</h2>
            </div>

            <div class="datos-group">
                <h2 id="correo">Correo:</h2>
            </div>

            <div class="datos-group">
                <h2 id="usuario">Usuario:</h2>
            </div>

            <div class="datos-group">
                <h2 id="telefono">Teléfono:</h2>
            </div>

            <div class="boton_responsive">
                <button name="mod" id="mod2">Modificar datos</button>
            </div>
        </div>
    </div>

    <footer>
        <h3>Solo Rieles</h3>
    </footer>
</body>
<script src="../js/datos_usuario.js"></script>
</html>
