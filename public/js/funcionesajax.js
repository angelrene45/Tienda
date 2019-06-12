$( document ).ready(function() {

    $(".btn-add-car").click(function(e){
      e.preventDefault(); //la pagina no refrescara
      console.log( "ready!" );
      var row = $(this).parents('tr');
      var form = $(this).parents('form');
      var url = form.attr('action');

      console.log(form.serialize());

      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(result){
              $("#numitems").text(result.total);
              console.log(result.message);
              swal("Articulo añadido!", "verifica el carrito!", "success");
        },
        error: function(e) {
           console.log(e);
        }
      });
    });

    
});
