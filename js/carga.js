$(window).on('load', function () {
      setTimeout(function () {
    $(".loader").fadeOut(1000);
    $(".contenedor").fadeIn(1000);
    setTimeout(function(){
        $("body").css({overflow:"visible"});
    },500);
  }, 3000);
});
