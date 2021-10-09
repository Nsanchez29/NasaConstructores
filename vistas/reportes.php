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
        <h1 class="text-center" style="color: black;">REPORTES</h1>
    </div>

    <br>

    <div class="container" style="background-color: white; padding: 25px;">

        <h2 class="text-center">Generar Estado de Cuenta de Usuarios</h2>
        <br>
        <br>

        <table id="usuarios" class="table text-center table-responsive-lg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Generar Estado de Cuenta</th>
                </tr>
            </thead>
            <tbody>
                <?php 
  $qusuario = "SELECT * FROM usuario";
  $resultado = mysqli_query($conexion,$qusuario);
  $i =0;
  while($rowUser = mysqli_fetch_array($resultado)){
    $i ++;
    ?>

                <tr>
                    <th scope="row"><?php echo $rowUser['id_usuario'] ?></th>
                    <td><?php echo $rowUser['nombre'] ?></td>
                    <td><?php echo $rowUser['usuario'] ?></td>
                    <td>
                        <div class="">

                            <div role="group" aria-label="Third group">
                                <button class="btn btn-outline-primary btn-block btn-lg" id="botongenerarPdf"
                                    type="button" data-toggle="modal" data-target="#GenerarPDFModal"
                                    data-id="<?php echo $rowUser['id_usuario']?>" data-nombre="<?php echo $rowUser['nombre']?>">
                                    <i class="fas fa-file-pdf"></i></button>
                            </div>
                        </div>
                    </td>
    </div>
    </tr>
    <?php 
  }
    ?>
    </tbody>
    </table>
    </div>




    <br>
    <br>

    <div class="footer text-center">
        <p>© Néstor Antonio Sánchez Larios 2021</p>
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

//Boton Usuario
$(document).on("click", "#botongenerarPdf", function() {
        var idUsuarioPDF = $(this).data('id');
        var nomUsuarioPDF = $(this).data('nombre');

        $("#idUs").val(idUsuarioPDF);
        $("#nomUs").val(nomUsuarioPDF);

    })

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
    });
    </script>

</body>

</html>