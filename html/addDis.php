<?php
  if(isset($_POST['id'])){
    include("../php/conexion.php");
    $bdd=new conexion();

    if($bdd->addDis($_POST['id'], $_POST['cantidad'], $_POST['talla'])){
      echo "true";
    }
  }
 ?>
