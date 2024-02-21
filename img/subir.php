<?php
  if(isset($_FILES['photo'])){
    if (($_FILES['photo']["type"] == "image/pjpeg")
    || ($_FILES['photo']["type"] == "image/jpeg")
    || ($_FILES['photo']["type"] == "image/png")
    || ($_FILES['photo']["type"] == "image/gif")) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../img/".$_FILES['photo']['name'])) {
        //more code here...
           $riel="../img/".$_FILES['photo']['name'];
           echo $riel;
         }
  }
}else{
  echo "no tienes acceso";
}
 ?>
