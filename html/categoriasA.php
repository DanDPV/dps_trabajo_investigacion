<?php
include '../php/conexion.php';
  if(isset($_POST['getAll'])){
    $bdd=new conexion();

    $retornable=$bdd->getCategoria();
    while($r=mysqli_fetch_array($retornable)){
      $json=array(
        'id' => utf8_encode($r['id']),
        'nombre' => utf8_encode($r['nombre']),
      );
      $rows[]=$json;
    }
    header('Content-Type: application/json');
    echo json_encode($rows, JSON_FORCE_OBJECT);
  }elseif (isset($_POST["new"])) {
    $print='<div id="contenedor_registro" class="contenedor-formulario">
      <form action="categoriasA.php" class="formulario" name="formulario_registro" id="formulario_registro" method="post" enctype="multipart/form-data">
        <div class="input-group">
          <input type="text" name="cat" id="categoria" required value="">
          <label class="label" for="cat">Nombre de la categoria:</label>
        </div>
          <input type="submit" name="newC" id="modificar" value="Registrar">
        </form>
      </div>';

      echo $print;
  }elseif (isset($_POST['newC'])) {
    $bdd=new conexion;
    if($bdd->newCategoria($_POST['cat'])){
      echo "<html>
      <head>
          <meta charset='utf-8'>
          <title>Solo Rieles - Datos del usuario</title>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <link rel='stylesheet' href='../css/modificar_datos.css'>
          <link rel='stylesheet' href='../pluggins/mensaje.min.css'>
          <link href='https://fonts.googleapis.com/css?family=Open+Sans&display=swap' rel='stylesheet'>
          <script src='../js/jquery-3.4.1.min.js' charset='utf-8'></script>
          <script src='../pluggins/mensaje.min.js'></script>
      </head>
      <body>
      <script type='text/javascript'>
      Swal.fire({
          type: 'success',
          title: 'Datos ingresados con exito',
          text: 'Una nueva categoria',
      }).then(function () {
        window.history.go(-2);
      });
      </script>
      </body>
      </html>
      ";
    }
  }

  else {
    echo "No tienes accceso";
  }
 ?>
