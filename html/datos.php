<?php
  if(isset($_POST['usuario'])){
    include('../php/conexion.php');
    $conn = new conexion();
    $retornable=$conn->buscarUsuario($_POST['usuario']);

    echo '
    <header>
        <a href="../index.html"><img src="../img/logo_sinfondo.png" width="150" alt=""></a>
        <h1>Datos del usuario</h1>
        <div>
            <button id="cerrar_sesion">Cerrar sesión</button>
        </div>
    </header>

    <nav>
        <a href="../index.html">Inicio</a>
        <a href="shopping.php">Stock</a>
        <a href="promociones.html">Promociones</a>
    </nav>

    <div class="contenedor">
        <div class="imagen">
            <img id="avatar" src="../'.$retornable['avatar'].'">
            <button name="mod" id="mod">Modificar datos</button>
    </div>

    <div class="datos">
        <div class="datos-group">
            <h2 id="dui">DUI: '.$retornable['DUI'].'</h2>
        </div>

        <div class="datos-group">
            <h2 id="nombres">Nombres: '.$retornable['Nombres'].'</h2>
        </div>

        <div class="datos-group">
            <h2 id="apellidos">Apellidos: '.$retornable['Apellidos'].'</h2>
        </div>

        <div class="datos-group">
            <h2 id="correo">Correo: '.$retornable['Email'].'</h2>
        </div>

        <div class="datos-group">
            <h2 id="usuario">Usuario: '.$retornable['username'].'</h2>
        </div>

        <div class="datos-group">
            <h2 id="telefono">Teléfono: '.$retornable['Telefono'].'</h2>
        </div>

        <div class="boton_responsive">
            <button name="mod" id="mod2">Modificar datos</button>
        </div>
    </div>
</div>

<footer>
    <h3>FleaMarket &copy</h3>
</footer>
<script type="text/javascript">
  var btn = document.getElementById("mod");
  if(btn.addEventListener){
      btn.addEventListener("click", redir, false);
  }else if(btn.attachEvent){
      btn.attachEvent("onclick", redir);
  }

  var btn2 = document.getElementById("mod2");
  if(btn2.addEventListener){
      btn2.addEventListener("click", redir, false);
  }else if(btn2.attachEvent){
      btn2.attachEvent("onclick", redir);
  }

  function redir(){
    window.location.href="modificar_datos.html";
  }
</script>
<script src="../js/cerrarSesion.js"></script>
    ';
  }
 ?>
