<?php
  if(isset($_POST['username'])){
    $username=$_POST['username'];
    $monto=$_POST['monto'];

    $montoR=explode('$',$monto);
    include('../php/conexion.php');
    $bdd=new conexion();
    echo $bdd->compraUsuario($username,$montoR[1]);
  }else{
    echo "no pasa";
  }
 ?>
