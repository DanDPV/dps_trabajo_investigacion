$(document).ready(function(){
  var user = sessionStorage.getItem('username');
  if (user != null) {
    $.ajax({
      type: 'POST',
      url: 'pagar.php',
      data: {
        username: user
      },
      success: function(data){
        $("#formulario_registro").html(data);
        $("#modificar").click(function(){
        var t = $("#tarjeta").val();
        var c = $("#codigo").val();
        if(t!='' && c!=''){
          if(t.match(/^(?:4\d([\- ])?\d{6}\1\d{5}|(?:4\d{3}|5[1-5]\d{2}|6011)([\- ])?\d{4}\2\d{4}\2\d{4})$/gm) && c.match(/^((CP \d{4}))/gm))
            window.location.href='regis_compra.html';
          else
          Swal.fire({
            type: 'error',
            title: 'Match error',
            text: 'Revisa que todos los datos coincidan con el formato indicado',
          });
        }

        });
      }
    });
  }else {
    window.location.href = 'login.php';
  }
});
