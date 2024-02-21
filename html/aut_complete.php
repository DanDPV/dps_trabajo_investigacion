<?php
if(isset($_POST['seller'])){
  include("../php/conexion.php");

  $bdd=new conexion();
  $palabra=$_POST['palabra'];
  $data=$bdd->autCompleteSeller($palabra);
  $i=0;
  while($dat=mysqli_fetch_array($data)){
    $i++;
    if($i%2==0)
      $class='par';
    else
      $class='impar';
    echo "<li onclick=\"set_item('".$dat['Nombre']."')\" class='$class'>".$dat['Nombre']."</li>";
  }
}else if(isset($_POST['palabra'])){
    include("../php/conexion.php");

    $bdd=new conexion();
    $palabra=$_POST['palabra'];
    $data=$bdd->autComplete($palabra);
    $i=0;
    while($dat=mysqli_fetch_array($data)){
      $i++;
      if($i%2==0)
        $class='par';
      else
        $class='impar';
      echo "<li onclick=\"set_item('".$dat['Nombre']."')\" class='$class'>".$dat['Nombre']."</li>";
    }
  }
 ?>
