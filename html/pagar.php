<?php
  if(isset($_POST['username'])){
    include('../php/conexion.php');

    $bdd=new conexion();
    $valores=$bdd->buscarUsuario($_POST['username']);

    echo '<div class="input-group">
        <input type="text" name="nombres" id="nombres" value="'.$valores['Nombres'].'" required>
        <label class="label" for="nombres"></label>
    </div>

    <div class="input-group">
        <input type="text" name="apellidos" id="apellidos" value="'.$valores['Apellidos'].'" required>
        <label class="label" for="apellidos">Apellidos:</label>
    </div>

    <div class="input-group">
        <input type="text" name="usuario" id="usuario" value="'.$valores['username'].'" readonly>
        <label class="label" for="usuario">Usuario:</label>
    </div>

    <div class="input-group">
        <input type="text" name="telefono" id="telefono" value="'.$valores['Telefono'].'" required pattern="[0-9]{4}-[0-9]{4}">
        <label class="label" for="telefono">Teléfono:</label>
        <label class="aclaracion">Formato: 0000-0000</label>
    </div>

    <div class="input-group">
        <input type="text" name="tarjeta" id="tarjeta" required">
        <label class="label" for="tarjeta">Tarjeta de crédito:</label>
    </div>

    <div class="input-group">
        <input type="text" name="codigo" id="codigo" required>
        <label class="label" for="codigo">Código postal:</label>
        <label class="aclaracion">Formato: CP ####</label>
    </div>

    <div class="input-group">
        <input type="text" name="direccion" id="direccion" value="'.$valores['Direccion'].'" required>
        <label class="label" for="direccion">Dirección:</label>
    </div>


    <input type="submit" id="modificar" value="Comprar">';
  }
 ?>
