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
            <h5 class="text-center">Nombre del Usuario</h5>
            <h1 class="display-4 text-center"><b><?php echo $row['nombre'] ?></b></h1>
            <h5 class="text-center">Usuario registrado</h5>
            <h1 class="display-4 text-center"><b><?php echo $row['usuario'] ?></b></h1>
            </fieldset>
            
            <div style="margin-left: 41%;">
            <button class="btn btn-warning" id="botonEditarContra" data-toggle="modal" data-target="#EditarContraModal" 
            data-id="<?php echo $row['id_usuario']?>" data-nombre="<?php echo $row['nombre']?>"
            data-usuario="<?php echo $row['usuario']?>">
            <i class="fas fa-pencil-alt"></i> Cambiar Contraseña</button>
            </div>
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
                    <?php 
                    $qingreso = "SELECT SUM(monto) as ingreso FROM transferencia WHERE id_usuariodest = '$IdUsuario'";
                    $resultado = mysqli_query($conexion,$qingreso);
                    
                    if($rowIngreso = mysqli_fetch_array($resultado)){

                        $ing= $rowIngreso['ingreso'];

                    }
                    ?>
                    <h3 class="card-text text-center">Q.
                        <?php echo $ing; ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg bg-danger text-light">
                <div class="card-body">
                    <h3 class="card-title text-center"><b>Total de Egresos</b></h3>
                    <hr>
                    <?php 
                    $qegreso = "SELECT SUM(monto) as egreso FROM egreso WHERE id_usuario = '$IdUsuario'";
                    $resultado = mysqli_query($conexion,$qegreso);
                    
                    if($rowEgreso = mysqli_fetch_array($resultado)){

                        $eg= $rowEgreso['egreso'];

                    }
                    ?>
                    <h3 class="card-text text-center">Q.
                        <?php echo $eg;?>
                    </h3>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg bg-warning text-light">
                <div class="card-body">
                    <h3 class="card-title text-center"><b>Capital</b></h3>
                    <hr>
                    <h3 class="card-text text-center">Q.
                        <?php
                            $capital = $ing - $eg;

                            echo $capital;
                        ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <br>
    
    <button class="btn btn-outline-primary btn-block btn-lg"
    id="botongenerarPdf" type="button"
    data-toggle="modal" data-target="#GenerarPDFModal"
    data-idU="<?php echo $IdUsuario?>"
    data-nom="<?php echo $nombreU?>">
        <i class="fas fa-file-pdf"></i> Obtener Estado de Cuenta</button>
  </div>
</div>
    
</div>




        <br>
        <br>
        
      <div class="footer text-center">
          <p>© Néstor Antonio Sánchez Larios 2021</p>
      </div>
     


      <!-- Modal Editar Contraseña -->
<div class="modal fade" id="EditarContraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Modificar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="../controladores/UpdateContra.php" method="POST">
        <input hidden type="text" class="form-control" id="idUsuario" placeholder="" name="idUsuario">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input disabled type="text" class="form-control" id="nombreEditar" name="nombreEditar" placeholder="Ingrese su Nombre" >
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input disabled type="text" class="form-control" id="usuarioEditar" name="usuarioEditar" placeholder="Ingrese su Usuario">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" id="contrasena" name="contrasenaEditar" placeholder="Ingrese su Contraseña">
            </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>

        </form>
    </div>
  </div>
</div>
</div>


<!-- Modal Generar PDF -->
<div class="modal fade" id="GenerarPDFModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <img src="../img/logo2.jpg" height="85px" width="130px">
                    <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel">
                        Generar PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controladores/PdfEstadoCuenta.php" method="POST">
                        <input hidden type="text" class="form-control" id="idUs" placeholder="" name="idUs">
                        <input hidden type="text" class="form-control" id="nomUs" placeholder="" name="nomUs">
                        <div class="input-group mb-3" style="justify-content: center; align-items: center;">
                            <div class="input-group-prepend">
                                <img src="../img/pdf.png" width="100px">
                            </div>
                        </div>
                        <h4 class="text-center">¿Desea Generar el Estado de Cuenta?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-window-close"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Generar</button>
                </div>
                </form>
            </div>
        </div>
    </div>







<script type="text/javascript">


//Boton Editar
$(document).on("click", "#botonEditarContra", function (){
    var id =$(this).data('id');
    var nombre =$(this).data('nombre');
    var usuario =$(this).data('usuario');

    $("#idUsuario").val(id);
    $("#nombreEditar").val(nombre);
    $("#usuarioEditar").val(usuario);

  })

  //Boton Usuario
  $(document).on("click", "#botongenerarPdf", function() {
        var idUsuarioPDF = $(this).data('idu');
        var nomUsuarioPDF = $(this).data('nom');

        $("#idUs").val(idUsuarioPDF);
        $("#nomUs").val(nomUsuarioPDF);

    })



    //Datatable
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

