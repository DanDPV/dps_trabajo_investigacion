window.onload = init;
var carrito = [];
var num = 0
var subT = 0;
var axx=0;

function init() {
  num=0;
  subT=0
  var compra = [];
  var sub = sessionStorage.getItem('carrito');
  var s = JSON.parse(sub);
  for (let i in s) {
    carrito[i] = s[i];
    var dato = JSON.parse(carrito[i]);
    console.log(dato);
    $.ajax({
      url: 'carrito.php',
      type: 'post',
      data: dato,
      success: function(dat) {
        made(dat, JSON.parse(carrito[axx]));
        axx++;
      },
      error: function() {
        console.log('error');
      }
    });
  }
}

function findCantidad(carrito, flag) {
  var aux = 0;
  for (var i = 0; i < carrito.length; i++) {
    if (carrito[i].name == flag) {
      aux++;
    }
  }
  return aux;
}

function limpiar() {

}

function saber(e) {
  var tag = e.srcElement.id;

  alert("El elemento selecionado ha sido " + tag);
}

function made(dat, dato) {
  var nodeTabla = document.getElementById('cuerpo');

  var nodeToClean;
  num++;
    //creacion de los elementos
    var nodeTR = document.createElement('tr');
    var nodeNum = document.createElement('td');
    var nodeName = document.createElement('td');
    var nodePrice = document.createElement('td');
    var nodeCategoria = document.createElement('td');
    var nodeTalla = document.createElement('td');
    var nodeCantidad = document.createElement('td');
    var nodeTotal = document.createElement('td');
    var nodeBorrar = document.createElement('td');
    var nodeImg = document.createElement('td');
    var img = document.createElement('img');

    img.setAttribute('src', dat.img);
    img.setAttribute('id', 'imgProducto');
    img.className += "zapato";
    nodeImg.appendChild(img);
    nodeBorrar.setAttribute('id', dat.Nombre);
    nodeBorrar.setAttribute('class', 'borro');
    //agragando datos a los elementos
    nodeNum.innerHTML = num;
    nodeName.innerHTML = dat.Nombre;
    nodePrice.innerHTML = "$" + dat.Precio;
    //var valor=findCantidad(compra,compra[i].name);
    nodeCategoria.innerHTML=dat.Categoria;
    nodeTalla.innerHTML=dat.Talla;
    nodeCantidad.innerHTML = dato.cantidad;
    subT += parseFloat(dat.Precio*dato.cantidad);
    nodeTotal.innerHTML = "$" + dat.Precio;
    nodeBorrar.innerHTML = "<img src='../img/delete.png' class='boton-delete'>"
    //construyendo el arbol del dom
    nodeTR.appendChild(nodeNum);
    nodeTR.appendChild(nodeImg);
    nodeTR.appendChild(nodeName);
    nodeTR.appendChild(nodePrice);
    nodeTR.appendChild(nodeCategoria);
    nodeTR.appendChild(nodeTalla);
    nodeTR.appendChild(nodeCantidad);
    nodeTR.appendChild(nodeTotal);
    nodeTR.appendChild(nodeBorrar);
    nodeTabla.appendChild(nodeTR);

  var nodeSubT = document.getElementById('subtotal');
  nodeSubT.innerHTML = "$" + subT.toFixed(2);
  var nodeDesc = document.getElementById('desc');
  nodeDesc.innerHTML = "$0.00";
  var nodeEnvio = document.getElementById('entrega');
  var nodeTotal = document.getElementById('total');
  if (!(num >= 2)) {
    subT += 10;
    nodeEnvio.innerHTML = "$10.00";
  } else {
    nodeEnvio.innerHTML = "$0.00";
  }
  nodeTotal.innerHTML = "$" + subT.toFixed(2);
  var ax = "#"+dat.Nombre;

  $(".borro").click(function(){
    var n = -1;
    id = $(this).attr("id");
    var count = 0;
    for(let i in carrito){
      var js=JSON.parse(carrito[i]);
      if(js.name==id){
        n=i;
        break;
      }
    }
    if(n==-1){
      return false;
    }
    var auxiliar = JSON.parse(carrito[n]);
    console.log(auxiliar.id);
    $.ajax({
      type: 'POST',
      url: 'addDis.php',
      data: {
        id: auxiliar.id,
        cantidad: auxiliar.cantidad,
        talla: auxiliar.talla
      },
      success: function(data) {
        if (data) {
          console.log(data);
        }
      },
      error: function(){
        console.log("error");
      }
    });

    console.log(n);
    carrito.splice(n,1);
    sessionStorage.removeItem("carrito");
    sessionStorage.setItem("carrito", JSON.stringify(carrito));
    console.log(carrito);
    nodeTabla.innerHTML = "";
    location.reload();
  });

  $('#btnCompra').click(function() {
    sessionStorage.setItem('lastMonto',document.getElementById('total').innerHTML);
    window.location.href='envio.html';
  });
}
