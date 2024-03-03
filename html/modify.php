<?php
  include('../php/conexion.php');
  if(isset($_POST['usuario'])){
    $bdd=new conexion();

    $retornable=$bdd->buscarUsuario($_POST['usuario']);
    if ($retornable['avatar']=='img/ninja.png') {
      $option='<option value="img/ninja.png" selected="selected">Ninja</option>
      <option value="img/peliroja.png">Mujer</option>
      <option value="img/mesero.png">Mesero</option>';
    }else if($retornable['avatar']=='img/peliroja.png'){
      $option='<option value="img/ninja.png">Ninja</option>
      <option value="img/peliroja.png" selected="selected">Mujer</option>
      <option value="img/mesero.png">Mesero</option>';
    }else{
      $option='<option value="img/ninja.png">Ninja</option>
      <option value="img/peliroja.png">Mujer</option>
      <option value="img/mesero.png" selected="selected">Mesero</option>';
    }
    echo '<div class="contenedor">
        <div class="wrap">
            <div id="contenedor_registro" class="contenedor-formulario">
                <form action="mod_fin.php" class="formulario" name="formulario_registro" id="formulario_registro" method="post">
                <input type="hidden" name="username" value="'.$_POST['usuario'].'">
                    <div class="input-group">
                        <input type="text" name="nombres" id="nombres" value="'.$retornable['Nombres'].'">
                        <label class="label" for="nombres">Nombres:</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="apellidos" id="apellidos" value="'.$retornable['Apellidos'].'">
                        <label class="label" for="apellidos">Apellidos:</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="usuario" id="usuario" value="'.$retornable['username'].'" readonly>
                        <label class="label" for="usuario">Usuario:</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="direccion" id="direccion" value="'.$retornable['Direccion'].'">
                        <label class="label" for="direccion">Direccion:</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="dui" id="dui" value="'.$retornable['DUI'].'" required pattern="[0-9]{8}-[0-9]{1}">
                        <label class="label" for="dui">DUI:</label>
                        <label class="aclaracion">Formato: ########-#</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="telefono" id="telefono" value="'.$retornable['Telefono'].'" required pattern="[0-9]{4}-[0-9]{4}">
                        <label class="label" for="telefono">Teléfono:</label>
                        <label class="aclaracion">Formato: 0000-0000</label>
                    </div>

                    <div class="input-group">
                        <label class="labelSelect" id="label3" for="image">Escoge un avatar:</label>
                        <select id="image" name="avatar">
                            '.$option.'
                        </select>
                    </div>

                    <div class="input-group avatar">
                        <img id="avatar" src="../'.$retornable['avatar'].'">
                    </div>

                    <input type="submit" name="MOD" id="modificar" value="Modificar">
                </form>
            </div>
        </div>
    </div>

    <script src="../js/logicaModificarDatos.js"></script>';
  }
 ?>
