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