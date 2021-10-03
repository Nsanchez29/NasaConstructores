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
        <h1 class="text-center" style="color: black;">TRANSFERENCIAS</h1>
    </div>

    <br>

    <div class="container" style="background-color: white; padding: 25px;">
        <button type="button" id="botonAgregar" class="btn btn-primary" data-toggle="modal"
            data-target="#TransferenciasModal" data-idu="<?php echo $IdUsuario?>">
            <i class="fas fa-plus-circle"></i> Agregar Nueva Transferencia
        </button>
        <br>
        <br>

        <table id="transferencias" class="table text-center">
            <thead>
                <tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario Débito</th>
                    <th scope="col">Usuario Crédito</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Tipo Transferencia</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $qtransferencia = "SELECT t.id_transferencia as idtransfer,
                                        t.monto as monto,
                                        t.descripcion as descrip,
                                        t.fecha as fechaT,
                                        t.tipo as tipo,
                                        usuario1.nombre as usuarioDebito,
                                        usuario2.nombre as usuarioCredito
                                        FROM transferencia t
                                        INNER JOIN usuario as usuario1 on usuario1.id_usuario = t.id_usuario
                                        INNER JOIN usuario as usuario2 on usuario2.id_usuario = t.id_usuariodest
                                        WHERE t.estado != 0 and t.id_usuario = '$IdUsuario'";

                    $resultadoT = mysqli_query($conexion,$qtransferencia);
                    $i =0;
                    while($transfer = mysqli_fetch_array($resultadoT)){
                      $i ++;
                      ?>

                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $transfer['usuarioDebito'] ?></td>
                    <td><?php echo $transfer['usuarioCredito'] ?></td>
                    <td><?php echo $transfer['descrip'] ?></td>
                    <td><?php echo $transfer['monto'] ?></td>
                    <td><?php echo $transfer['fechaT'] ?></td>
                    <td><?php echo $transfer['tipo'] ?></td>
                    <td>
                        <div class="">

                            <div role="group" aria-label="Third group">
                                <button type="button" id="botonEditarTransferencia" class="btn btn-warning" data-toggle="modal"
                                    data-target="#EditarTransferenciaModal"
                                    data-id="<?php echo $transfer['idtransfer']?>"
                                    data-monto="<?php echo $transfer['monto']?>"
                                    data-descri="<?php echo $transfer['descrip']?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </div>
                    </td>
                    <td>
                        <div role="group" aria-label="Third group">
                            <button type="button" id="botonEliminarT" class="btn btn-danger" data-toggle="modal"
                                data-target="#EliminarTransferenciaModal"
                                data-id="<?php echo $transfer['idtransfer']?>">
                                <i class="fas fa-trash-alt"></i>
                            </button>
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



    <!-- Modal -->
    <div class="modal fade" id="TransferenciasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <img src="../img/logo2.jpg" height="85px" width="130px">
                    <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel">Nueva
                        Transferencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-Propias"
                                role="tab" aria-controls="nav-home" aria-selected="true">Propias</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-Terceros" role="tab"
                                aria-controls="nav-profile" aria-selected="false">Terceros</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-Propias" role="tabpanel"
                            style="padding: 0.8rem;">

                            <form action="../controladores/NewTransferenciaPropia.php" method="POST">
                                <!--MONTO-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><b>Q.</b> </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ingrese Monto"
                                        id="MontoTPropia" name="MontoTPropia">
                                </div>
                                <!--DESCRIPCION-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-comment"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ingrese Descripcion"
                                        id="descripcionTPropia" name="descripcionTPropia">
                                </div>
                                <!--USUARIO-->
                                <input hidden type="text" class="form-control" id="idUsuario" placeholder=""
                                    name="idUsuario">
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="fas fa-window-close"></i> Cancelar</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                        Guardar</button>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane fade" id="nav-Terceros" role="tabpanel" style="padding: 0.8rem;">
                            <!--TRANSFERENCIA A TERCERO-->
                            <form action="../controladores/NewTransferenciaTercero.php" method="POST">
                                <!--USUARIO DESTINO-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select class="form-control" id="usuarioDestino" name="usuarioDestino">
                                        <option>Seleccione Usuario Destino</option>
                                        <?php
                       
                                            $consulta ="SELECT * FROM usuario
                                            where id_usuario != '$IdUsuario'";
                                            $ejec=mysqli_query($conexion,$consulta);
                                            ?>

                                        <?php foreach ($ejec as $proyecto): ?>

                                        <option value="<?php echo $proyecto['id_usuario']  ?>">
                                            <?php echo $proyecto['nombre']?>
                                        </option>

                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!--MONTO-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><b>Q.</b> </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ingrese Monto"
                                        id="MontoTransferenciaTercero" name="MontoTransferenciaTercero">
                                </div>
                                <!--DESCRIPCION-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-comment"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ingrese Descripcion"
                                        id="descripcionTransferenciaTercero" name="descripcionTransferenciaTercero">
                                </div>
                                <!--USUARIO-->
                                <input hidden type="text" class="form-control" id="idUsuarioTercero" placeholder=""
                                    name="idUsuarioTercero">
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="fas fa-window-close"></i> Cancelar</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                        Guardar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Editar Transferencia -->
    <div class="modal fade" id="EditarTransferenciaModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <img src="../img/logo2.jpg" height="85px" width="130px">
                    <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Modificar
                        Egreso Monetario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controladores/UpdateTransferencia.php" method="POST">
                        <input hidden type="text" class="form-control" id="IdTransEdi" placeholder="" name="IdTransEdi">
                        <!--MONTO-->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><b>Q.</b> </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingrese Monto" id="MontoTransEdi"
                                name="MontoTransEdi">
                        </div>
                        <!--DESCRIPCION-->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-comment"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingrese Descripcion"
                                id="descripcionTransEdi" name="descripcionTransEdi">
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fas fa-window-close"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Eliminar Transferencia -->
    <div class="modal fade" id="EliminarTransferenciaModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <img src="../img/logo2.jpg" height="85px" width="130px">
                    <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel">
                        Eliminar Transferencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controladores/DeleteTransferencia.php" method="POST">
                        <input hidden type="text" class="form-control" id="idTransf" placeholder="" name="idTransf">
                        <div class="input-group mb-3" style="justify-content: center; align-items: center;">
                            <div class="input-group-prepend">
                                <img src="../img/danger.png" width="100px">
                            </div>
                        </div>
                        <h4 class="text-center">¿Desea Eliminar la Transferencia?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-window-close"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    //Boton Editar
    $(document).on("click", "#botonEditarTransferencia", function() {
        var IDTr = $(this).data('id');
        var montoTr = $(this).data('monto');
        var descripcionTr = $(this).data('descri');

        $("#IdTransEdi").val(IDTr);
        $("#MontoTransEdi").val(montoTr);
        $("#descripcionTransEdi").val(descripcionTr);

    })

    //Boton Eliminar
    $(document).on("click", "#botonEliminarT", function() {
        var idEliminarT = $(this).data('id');

        //console.log("se recibe", idEliminarT);

        $("#idTransf").val(idEliminarT);

        //console.log("se envio el parametro");

    })


    //Boton Usuario
    $(document).on("click", "#botonAgregar", function() {
        var idUsuario = $(this).data('idu');

        $("#idUsuario").val(idUsuario);
        $("#idUsuarioTercero").val(idUsuario);

    })




    $(document).ready(function() {
        $('#transferencias').DataTable({
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