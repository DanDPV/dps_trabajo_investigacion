$(document).ready(function(){
  var btn = document.getElementById("cerrar_sesion");
  if (btn.addEventListener) {
      btn.addEventListener("click", cerrarSesion, false);
  } else if (btn.attachEvent) {
      btn.attachEvent("onclick", cerrarSesion);
  }
});

function cerrarSesion() {
    if('carrito' in sessionStorage){
      var carrito=[];

      var sub = sessionStorage.getItem('carrito');
      var s = JSON.parse(sub);
      for (let i in s) {
        carrito[i] = s[i];
        var dato = JSON.parse(carrito[i]);

        $.ajax({
          type: 'POST',
          url: 'addDis.php',
          data: {
            id: dato.id,
            cantidad: dato.cantidad,
            talla: dato.talla
          },
          success: function(data) {
            if (data) {
              clear();
            }
          }
        });
      }
      clear();
    }else{
      clear();
    }

}

function clear(){
  sessionStorage.clear();
  localStorage.clear();
  if(document.title=='FleaMarket'){
    window.location.href = 'index.html';
  }else{
    window.location.href = '../index.html';
  }
}
