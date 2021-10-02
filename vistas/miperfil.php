<?php


include '../modelos/conexion.php';

//INICIA LA SESION EN EL SISTEMA
session_start();
//SI EXISTEN DATOS PARA INICIAR LA SESION SE OBTIENEN LAS VARIABLES SIGUIENTES
if (isset($_SESSION['nombreUsuario'])){
  
    $nombreU = $_SESSION['nombreUsuario'];
    $IdUsuario = $_SESSION['UsuarioId'];
    $rolUsuario= $_SESSION['rolUsuario']; 
  
}else{

    header("location:../vistas/miperfil.php"); 

}

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php

include "header/directorio.php"

?>
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

            <?php 
                    $qusuario = "SELECT * FROM usuario WHERE id_usuario = '$IdUsuario'";
                    $resultado = mysqli_query($conexion,$qusuario);
                    $i =0;
                    while($row = mysqli_fetch_array($resultado)){
                    $i ++;

            ?>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i> Nombre</span>
                </div>
                <input type="text" class="form-control" placeholder="<?php echo $row['nombre'] ?>" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i> Usuario</span>
                </div>
                <input type="text" class="form-control" placeholder="<?php echo $row['usuario'] ?>" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            </fieldset>
            <?php
                    }
            ?>
        </div>
    </div>

    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center"><b>Estado de Cuenta</b></h1>
    <p class="text-center">Se detalla información del estado de cuenta del usuario</p>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <div class="card bg bg-success text-light">
                <div class="card-body">
                    <h3 class="card-title text-center"><b>Total de Ingresos</b></h3>
                    <hr>
                    <h3 class="card-text text-center">Q.</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg bg-danger text-light">
                <div class="card-body">
                    <h3 class="card-title text-center"><b>Total de Egresos</b></h3>
                    <hr>
                    <h3 class="card-text text-center">Q.</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg bg-warning text-light">
                <div class="card-body">
                    <h3 class="card-title text-center"><b>Capital</b></h3>
                    <hr>
                    <h3 class="card-text text-center">Q.</h3>
                </div>
            </div>
        </div>
    </div>
    <br>
    <button class="btn btn-outline-primary btn-block btn-lg"><i class="fas fa-file-pdf"></i> Obtener Estado de Cuenta</button>
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

