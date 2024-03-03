<?php
  if(!isset($_POST['super']) && !isset($_POST['comprado'])){
    header("Location: shopping.php");
    exit;
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/detalles.css">
        <link rel="stylesheet" href="../pluggins/mensaje.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="../pluggins/mensaje.min.js"></script>
    <script src="../js/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="../js/info.js" charset="utf-8"></script>
    <script src="../js/control.js" charset="utf-8"></script>
    <title>
      <?php
        echo $_POST['riel'];
       ?>
    </title>
</head>

<body>
  <?php
      if(isset($_POST['comprado'])){
        include('../php/conexion.php');
        $bdd=new conexion();
        $data=$bdd->buscarRielN($_POST['comprado']);
        echo "<script language='javascript'>
        var user = sessionStorage.getItem('username');
        if(user!=null){
          Swal.fire({
              type: 'success',
              title: 'Buena eleccion',
              text: 'Producto agregado al carrito',
          }).then(function () {
            var carrito=[];
            if(sessionStorage['carrito']){
              var sub = sessionStorage.getItem('carrito');
              var s = JSON.parse(sub);
              for (let i in s)
                  carrito[i] = s[i];
            }
            var myJson={name: '".$_POST['comprado']."', talla: '".$_POST['talla']."', id:'".$_POST['ID']."', cantidad:'".$_POST['car']."'};
            var ss = JSON.stringify(myJson);
            carrito.push(ss);

            sessionStorage.setItem('carrito',JSON.stringify(carrito));
            sessionStorage.setItem('lastShoes','".$_POST['comprado']."');
            sessionStorage.setItem('lastMonto','".$_POST['monto']."');
            ".$bdd->reduce($_POST['ID'],$_POST['talla'],$_POST['car'])."
            window.location='shopping.php';
          });
        }else{
          Swal.fire({
            type: 'error',
            title: 'No has iniciado sesion',
            text: 'Debes iniciar sesion para poder comprar'
          }).then(function() {
            window.location='login.php';
          });
        }

        </script>
        ";
      }else{
   ?>
    <div class="contenedor">
        <header>
            <div class="flecha">
                <a href="shopping.php"><img class="flecha" src="../img/left-arrow.png" width="150" alt=""></a>
            </div>

            <div>
                <a href="../index.html"><img class="logo" src="../img/logo_sinfondo.png" width="150" alt=""></a>
            </div>

            <div class="carrito">
                <a href="carrito.html"><img id="carrito_btn" src="../img/carrito.png" alt="carrito"></a>
            </div>
        </header>
        <nav>
            <a href="shopping.php">Stock</a>
            <a href="intermedia.html">Perfil</a>
        </nav>
        <?php
          include('../php/conexion.php');
          $conn = new conexion();
          $data=$conn->buscarRielIDD($_POST['ID']);
         ?>
        <section class="main">
            <article>
                <div class="imagen">
                  <?php
                    echo "<img src='".$data['img']."'>";
                   ?>
                </div>
                <h2 class="titulo"></h2>
            </article>

        </section>

        <aside>
            <div class="widget">
                <div class="title">
                    <h3>
                        <?php
                            echo $data['Nombre'];
                         ?>
                    </h3>
                </div>
                <div class="precio">
                    <p>
                      <?php echo "$".$data['Precio']; ?>
                    </p>
                </div>

                <h5>Tallas:</h5>
                <div class="tallas">
                    <ul id="lista">
                      <form action='info.php' method='post'>
                        <?php
                        echo "<input type='hidden' id='ID' name='ID' value='".$_POST['ID']."'></input>";
                        echo '<input type="hidden" name="monto" value="'.$data['Precio'].'">'; ?>
                        <select class="select-css" name="talla" id='talla'>
                          <?php
                            $conn->getTallas($_POST['ID']);
                           ?>
                        </select>
                    </ul>
                </div>

                <div class="title" id='cantidades'>
                  <br>
                  <br>

                </div>
                <div class="title">
                  <h3>Llevo: </h3>
                  <div class="quantity">
                    <input type="number" min="1" step="1" value="1" id="can" name='car'>
                  </div>
                </div>

                <div class="leyenda">
                    <p>
                      <?php
                        echo $data['Descripcion'];
                       ?>
                    </p>
                </div>
                <div class="materiales">
                    <br>
                    <h4>Materiales:</h4>
                    <br>
                    <p>
                      <?php
                        echo $data['Materiales'];
                       ?>
                    </p>
                </div>
                <?php
                  echo "

                    <button type='submit' id='comprar' name='comprado' value='".$data['Nombre']."'>Comprar</button>
                  </form>";
                 ?>
            </div>

        </aside>


        <footer>
            <h3>Solo Rieles</h3>

        </footer>
    </div>
  <?php } ?>
</body>
<!--Script para utilizar SweetAlert2 -->
<script src="../js/cerrarSesion.js"></script>
</html>
