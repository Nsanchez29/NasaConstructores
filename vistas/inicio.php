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
    <link rel="stylesheet" href="../css/inicio.css">
    <script src="https://kit.fontawesome.com/7e73ebaf62.js" crossorigin="anonymous"></script>
</head>
<body>
    
<?php

    include "header/header.php"

?>

<br>

<div class="container">
    <h1 class="text-center" style="color: black;">SISTEMA NASA CONSTRUCTORES</h1>
    <h2 class="text-center" style="color: black;"><?php 
    date_default_timezone_set("America/Guatemala");
    echo date("d/m/Y") ?></h2>
</div>

<br>    

<div class="container" style="background-color: white; padding: 25px;">
  <div class="row">
    <div class="col-sm">
        <div class="jumbotron center">
            <h1 class="display-6 text-center">Proyectos</h1>
                <hr class="my-6">
                <p class="text-center">Información de Proyectos</p>
                <a class="btn btn-primary btn-block" href="proyectos.php" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>
    </div>
    <div class="col-sm">
        <div class="jumbotron">
            <h1 class="display-6 text-center">Clientes</h1>
                <hr class="my-6">
                <p class="text-center">Información de Clientes</p>
                <a class="btn btn-primary btn-block" href="clientes.php" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>  
    </div>
    <div class="col-sm">
        <div class="jumbotron">
            <h1 class="display-6 text-center">Ingresos</h1>
                <hr class="my-6">
                <p class="text-center">Información de Ingresos</p>
                <a class="btn btn-primary btn-block" href="ingresos.php" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>
    </div>
    <div class="col-sm">
        <div class="jumbotron">
            <h1 class="display-6 text-center">Egresos</h1>
                <hr class="my-6">
                <p class="text-center">Información de Egresos</p>
                <a class="btn btn-primary btn-block" href="egresos.php" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>
    </div>
    <div class="col-sm">
        <div class="jumbotron">
            <h1 class="display-6 text-center">Estado de Cuenta</h1>
                <hr class="my-6">
                <p class="text-center">Información de Estado de Cuenta</p>
                <a class="btn btn-primary btn-block" href="#" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>
    </div>
  </div>
</div>




        <br>
        <br>
        
      <div class="footer text-center">
          <p>© Néstor Antonio Sánchez Larios 2021</p>
      </div>
     
      

</body>
</html>

