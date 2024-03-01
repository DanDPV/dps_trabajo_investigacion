<?php
  if(isset($_POST['id'])){
    $rielid=$_POST['id'];
    $cantidad=$_POST['cantidad'];
    $talla=$_POST['talla'];
    $idCompra=$_POST['idCompra'];
    include('../php/conexion.php');
    $bdd = new conexion();
    if($bdd->compraRiel($rielid, $talla, $cantidad, $idCompra)){
      echo true;
    }else{
      echo false;
    }
  }
 ?>
