<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Nasa Constructores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="../css/inicio.css">
    <script src="https://kit.fontawesome.com/7e73ebaf62.js" crossorigin="anonymous"></script>
</head>
<body>
    
<?php

    include "header/header.php"

?>

<br>

<div class="container">
    <h1 class="text-center" style="color: black;">MI PERFIL</h1>
</div>

<br>    

<div class="container" style="background-color: white; padding: 25px;">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center"><b>Información Personal</b></h1>
            <p class="text-center">Se detalla información personal del usuario</p>
            <hr>
            <fieldset disabled>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su Nombre" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su Correo Electronico" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su Usuario" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            </fieldset>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
                <button class="btn btn-warning">Editar</button>
            </div>
        </div>
    </div>
    <br>

    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center"><b>Estado de Cuenta</b></h1>
    <p class="text-center">Se detalla información del estado de cuenta del usuario</p>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <div class="card bg bg-success text-light">
                <div class="card-body">
                    <h3 class="card-title text-center"><b>Total de Ingresos</b></h3>
                    <hr>
                    <h3 class="card-text text-center">Q.</h3>
                    <a href="ingresos.php" class="btn btn-primary"><i class="fas fa-search-plus"></i> Ver Más</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card bg bg-danger text-light">
                <div class="card-body">
                    <h3 class="card-title text-center"><b>Total de Egresos</b></h3>
                    <hr>
                    <h3 class="card-text text-center">Q.</h3>
                    <a href="egresos.php" class="btn btn-primary text-center"><i class="fas fa-search-plus"></i> Ver Más</a>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
    
</div>




        <br>
        <br>
        
      <div class="footer text-center">
          <p>© Néstor Antonio Sánchez Larios 2021</p>
      </div>
     









<script type="text/javascript">
    $(document).ready(function() {
    $('#usuarios').DataTable({
        "language": {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    }
    });
} );
</script>


</body>
</html>

