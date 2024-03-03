<?php
  include('../php/conexion.php');
  if(isset($_POST['MOD'])){
    $bdd=new conexion();
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $usuario=$_POST['usuario'];
    $dui=$_POST['dui'];
    $telefono=$_POST['telefono'];
    $avatar=$_POST['avatar'];
    $username=$_POST['username'];
    $direccion=$_POST['direccion'];
    $cadena="update cliente set Nombres='$nombres', Apellidos='$apellidos', username='$usuario', DUI='$dui', Telefono='$telefono', avatar='$avatar', Direccion='$direccion' where username='$username'";
    if($bdd->updateUsuario($cadena)){
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
          title: 'Datos actualizados con exito',
          text: 'Como nuevo',
      }).then(function () {
        window.history.go(-2);
      });
      </script>
      </body>
      </html>
      ";
    }
  }else if(isset($_POST['rielMOD'])){
    $bdd=new conexion();
    $img='';
    if(($_FILES['riel']['name']!='')){
      move_uploaded_file($_FILES["riel"]["tmp_name"], "../img/".$_FILES['riel']['name']);
      $img="../img/".$_FILES['riel']['name'];
    }else{
      $img=$_POST['imgRiel'];
    }
    if($bdd->updateRiel($_POST['nombre'],$_POST['marca'], $_POST['precio'], $_POST['talla'], $img, $_POST['descripcion'], $_POST['materiales'], $_POST['disponibilidad'], $_POST['idRiel'], $_POST['idTalla'], $_POST['categoria'], $_POST['idPT'])){
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
          title: 'Datos actualizados con exito',
          text: 'Como nuevo',
      }).then(function () {
        window.history.go(-2);
      });
      </script>
      </body>
      </html>
      ";
    }
  }else{
    echo "<h1>No tienes acceso a este pagina</h1>";
  }
 ?>
