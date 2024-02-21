$(document).ready(function(){
  var user = sessionStorage.getItem('username');
  if (user != null) {
    $('#clo').html('<button id="cerrar_sesion">Cerrar sesión</button>');
    $('nav').html('<a href="html/shopping.php">Stock</a>'+
    '<a href="html/intermedia.html">Perfil</a>'+
    '<a href="html/promociones.html">Promociones</a>');
  }else{
    $('nav').html('<a href="html/shopping.php">Stock</a>'+
    '<a href="html/intermedia.html">Perfil</a>'+
    '<a href="html/promociones.html">Promociones</a>'+
    '<a href="html/login.php">Iniciar sesión</a>');
  }
});
