function autocompletar(){
  var min = 1;
  var palabra = $('#busqueda').val();
  if(palabra.length>=min){
    $.ajax({
      url: "../html/aut_complete.php",
      type: "post",
      data: {palabra:palabra},
      success: function(data){
        $("#rieles_opc").show();
        $("#rieles_opc").html(data);
      }
    });
  }else{
      $("#rieles_opc").hide();
      $.ajax({
        url: 'getRiel.php',
        type: 'post',
        data: {riel:"---"},
        success: function(data){
          $("#principal").html(data);
        }
      });
  }

}

function set_item(opciones){
  $("#busqueda").val(opciones);
  $("#rieles_opc").hide();

  $.ajax({
    url: 'getRiel.php',
    type: 'post',
    data: {riel:opciones},
    success: function(data){
      $("#principal").html(data);
    }
  });
}

function buscar(){
  var buscar=$("#busqueda").val();
  $("#rieles_opc").hide();
  $.ajax({
    url: 'getRiel.php',
    type: 'post',
    data: {riel:buscar},
    success: function(data){
      $("#principal").html(data);
    },
    error: function(){
      console.log("error");
    }
  });
}

function focused(){
  $("#rieles_opc").show();
}
