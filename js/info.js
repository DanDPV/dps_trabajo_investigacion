$(document).ready(function() {
  var imageForm = document.getElementById('talla');

  imageForm.onchange = populateStorage;
  var id = document.getElementById('ID').value;
  var talla = imageForm.value;
  get();
});

function populateStorage() {
  get();
}

function get() {
  $.ajax({
    url: "../html/admin_riel.php",
    type: "post",
    data: {
      cantidades: document.getElementById('ID').value,
      talla: document.getElementById('talla').value
    },
    success: function(data) {
      $("#cantidades").html(data);
    }
  });

  $.ajax({
    url: "../html/admin_riel.php",
    type: "post",
    data: {
      seleccion: document.getElementById('ID').value,
      talla: document.getElementById('talla').value
    },
    success: function(data) {
      $("#can").attr('max', data);
    }
  });
}
