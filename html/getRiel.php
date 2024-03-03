<?php
  if(isset($_POST['riel'])){
    include("../php/conexion.php");

    $bdd=new conexion;

    $query=$bdd->shoesSearch($_POST['riel']);
    while($valores=mysqli_fetch_array($query)){
      $cantidad=$bdd->valCant($valores['id']);
      $agotado='';
      if($cantidad==0)
        $agotado="<h5 class='agotado'>Agotado</h5>";
      else if($cantidad==1)
        $agotado="<h5 class='disponible'>Tenemos: ".$cantidad." disponible</h5>";
      else
        $agotado="<h5 class='disponible'>Tenemos: ".$cantidad." disponibles</h5>";
      echo "
        <div class='card'>
          <img src='".$valores['img']."'>
          <h4>".$valores['Nombre']."</h4>
          <h5>$".$valores['precio']."</h5>
          $agotado
          <form action='info.php' method='post'>
            <input type='hidden' value='".$valores['id']."' name='ID' id='iden'>
            <input type='hidden' value='".$valores['Nombre']."' name='riel'>
            <input name='super' type='submit' class='button' value='Ver mas'></input>
          </form>
        </div>
      ";
    }
  }else if($_POST['rielLike']){
    $bdd=new conexion();

    $retornable=$bdd->getRielLike($_POST['rielLike']);
    header('Content-Type: application/json');
    echo json_encode($retornable, JSON_FORCE_OBJECT);
  }
 ?>
