<?php
  include('../php/conexion.php');
  header('Content-Type: application/json');
  $nombre=$_POST['id'];
  $talla=$_POST['talla'];
  $db=new conexion();
  $datos = $db->buscarRielbyTalla($nombre, $talla);

  echo json_encode($datos[0], JSON_FORCE_OBJECT);
 ?>
