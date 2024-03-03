<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Solo Rieles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.css" type="text/css">
    <link rel="stylesheet" href="../pluggins/mensaje.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="../pluggins/mensaje.min.js"></script>
</head>

<body>
  <?php
    include('../php/conexion.php');
    if(isset($_POST['ingresar'])){
      $dir;
      $conn = new conexion();
        $retorno=$conn->login($_POST['username'],$_POST['password']);
        if($retorno===0){
          echo "<script language='javascript'>Swal.fire({
              type: 'error',
              title: 'Error',
              text: 'Usuario o contraseña incorrecta',
          });</script>";

        }else{
          if($retorno=='cliente'){
            $dir='../index.html';
          }else if($retorno=='admin')
            $dir='admin.html';
          else if($retorno=='seller')
            $dir='seller.html';
          echo "<script language='javascript'>
            sessionStorage.setItem('username', '".$_POST['username']."');
            window.location='$dir';
          </script>";
        }
    }
    elseif (isset($_POST['regis'])) {
      $conn = new conexion();
      $conn->registrar($_POST['nombres'], $_POST['apellidos'], $_POST['correo'],
      $_POST['usuario'], $_POST['contra'], $_POST['telefono'], $_POST['direccion'], $_POST['dui'], 'img/ninja.png');
      echo "<script language='javascript'>Swal.fire({
          type: 'success',
          title: 'Bienvenido' + '  ' + '".$_POST['usuario']."',
          text: 'Usuario registrado con éxito',
      });</script>";
    }
   ?>
    <div class="contenedor">
        <div class="logo">
            <img src="../img/logo2.png" width="350">
        </div>

        <div class="formularios">
            <div class="tab">
                <button class="tablinks btn1" name="defaultOpen" id="btnLogin">Iniciar sesión</button>
                <button class="tablinks btn2" id="btnRegister">Registrarse</button>
            </div>

            <div id="contenedor_login" class="tabcontent contenedor-formulario">
                <form action="login.php" class="formulario" name="formulario_login" id="formulario_login" method="post">
                    <div class="input-group">
                        <input type="text" name="username" id="username">
                        <label class="label" for="username">Usuario o correo:</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="password" id="password">
                        <label class="label" for="password">Contraseña:</label>
                    </div>
                    <input name='ingresar' type="submit" id="" value="Iniciar Sesión">
                </form>
            </div>

            <div id="contenedor_registro" class="tabcontent contenedor-formulario">
                <form action="login.php" class="formulario" name="formulario_registro" id="formulario_registro" method="post">
                    <div class="input-group">
                        <input type="text" name="nombres" id="nombres" required>
                        <label class="label" for="nombres">Nombres:</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="apellidos" id="apellidos" required>
                        <label class="label" for="apellidos">Apellidos:</label>
                    </div>

                    <div class="input-group">
                        <input type="email" name="correo" id="correo" required>
                        <label class="label" for="correo">Correo:</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="usuario" id="usuario" required>
                        <label class="label" for="usuario">Usuario:</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="contra" id="contra" required>
                        <label class="label" for="contra">Contraseña:</label>
                        <label class="aclaracion">8 caracteres mínimo. Al menos un caracter en mayúscula, un número
                        y un caracter especial</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="confirm_password" id="confirm_password" required>
                        <label class="label" for="confirm_password">Confirmar contraseña:</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="telefono" id="telefono" required pattern="[0-9]{4}-[0-9]{4}">
                        <label class="label" for="telefono">Teléfono:</label>
                        <label class="aclaracion">Formato: 0000-0000</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="direccion" id="direccion" required>
                        <label class="label" for="direccion">Direccion:</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="dui" id="dui" required pattern="[0-9]{8}-[0-9]{1}">
                        <label class="label" for="dui">DUI:</label>
                        <label class="aclaracion">Formato: 00000000-0</label>
                    </div>

                    <div class="input-group checkbox">
                        <input type="checkbox" name="terminos" id="terminos" value="true">
                        <label for="terminos">Acepto los Terminos y Condiciones</label>
                    </div>

                    <input type="submit" id="btnRegistrarse" name='regis' value="Registrarse">
                </form>
            </div>
        </div>
    </div>

    <!--<div class="tabla">
        <h2>Usuarios</h2>
        <table class="table table-hover" id="tableUsuarios">
            <thead>
                <tr>
                    <td>DUI</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Correo</td>
                    <td>Usuario</td>
                    <td>Telefono</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>-->

</body>
<script src="../js/formulario_login.js"></script>

<!--Script para validar campos del registro de usuarios -->
<script src="../js/formulario_registro.js"></script>

<!--Script para manejar los tabs del formulario -->
<script src="../js/tabsLogin.js"></script>

<!--Script que maneja la lógica del inicio de sesión -->
<script src="../js/logicaLogin.js"></script>

<!--Script que interactúa con la interfaz para iniciar sesión -->
<script src="../js/interfazLogin.js"></script>

<!--Script que maneja la lógica para registrar nuevos usuarios -->
<script src="../js/logicaRegistrarUsuario.js"></script>

<!--Script para utilizar los Objetos creados para el proyecto -->
<script src="../js/objetos.js"></script>

<!--Script para utilizar SweetAlert2 -->
</html>
