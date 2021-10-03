//Funcion Municipios
$(document).ready(function(){

    //var muni = $('#Listamunicipios');

    $('#departamentos').change(function(){
      
      var id = $('#departamentos').val();

      $.get("../controladores/municipios.php", {paramid: id})
      .done(function(data){

        $("#Listamunicipios").html(data);
        //console.log("envia datos", data);

      });
    });

});


//Funcion Municipios Editar
$(document).ready(function(){


  $('#departamentosE').change(function(){
    
    var EditarId = $('#departamentosE').val();

    $.get("../controladores/municipios.php", {paramid: EditarId})
    .done(function(data){

      $("#ListamunicipiosE").html(data);
      //console.log("envia datos", data);

    });
  });

});