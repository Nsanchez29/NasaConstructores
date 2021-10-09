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
    <h1 class="text-center" style="color: black;">EGRESOS</h1>
</div>

<br>    

<div class="container" style="background-color: white; padding: 25px;">
    <button type="button" id="botonAgregar" class="btn btn-primary" data-toggle="modal" data-target="#egresoModal"
    data-idu="<?php echo $IdUsuario?>">
    <i class="fas fa-plus-circle"></i> Agregar Nuevo Egreso
    </button>
    <br>
    <br>

    <table id="egresos" class="table text-center table-responsive-lg">
  <thead>
    <tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Proyecto</th>
      <th scope="col">Cliente</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Fecha</th>
      <th scope="col">Monto</th>
      <th scope="col">Usuario</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $qegreso = "SELECT e.id_egreso as idegreso, p.nombre as nomproyectoE, c.nombre as nomclienteE, e.fecha as fechaE, 
               e.monto as montoE, e.descripcion as descripcionE, u.nombre as nombreUsuario FROM egreso e
               inner join usuario as u on e.id_usuario = u.id_usuario
               inner join proyecto as p on e.proyecto = p.id_proyecto
               inner join cliente as c on p.id_cliente = c.id_cliente
                WHERE e.estado !=0 and e.id_usuario = '$IdUsuario'";
  $resultadoE = mysqli_query($conexion,$qegreso);
  $i =0;
  while($egreso = mysqli_fetch_array($resultadoE)){
    $i ++;
    ?>
   
    <tr>
    <th scope="row"><?php echo $i ?></th>
      <td><?php echo $egreso['nomproyectoE'] ?></td>
      <td><?php echo $egreso['nomclienteE'] ?></td>
      <td><?php echo $egreso['descripcionE'] ?></td>
      <td><?php echo $egreso['fechaE'] ?></td>
      <td><?php echo $egreso['montoE'] ?></td>
      <td><?php echo $egreso['nombreUsuario'] ?></td>
      <td> 
      <div class="" >

        <div role="group" aria-label="Third group">
        <button type="button" id="botonEditarEgreso" class="btn btn-warning" data-toggle="modal" data-target="#EditarEgresoModal"
        data-id="<?php echo $egreso['idegreso']?>" data-monto="<?php echo $egreso['montoE']?>"
         data-descri="<?php echo $egreso['descripcionE']?>">
        <i class="fas fa-pencil-alt"></i>
        </button>
            </div>
            </td>
      <td>
      <div role="group" aria-label="Third group">
        <button type="button" id="botonEliminar" class="btn btn-danger" data-toggle="modal" data-target="#EliminarEgresoModal"
        data-ide="<?php echo $egreso['idegreso']  ?>">
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
<div class="modal fade" id="egresoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Egreso Monetario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/NewEgreso.php" method="POST">

            <!--PROYECTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                </div>
                <select class="form-control" id="proyectoEgreso" name="proyectoEgreso">
                    <option>Seleccione Proyecto</option>
                    <?php
                       
                        $consulta ="SELECT * FROM proyecto";
                        $ejec=mysqli_query($conexion,$consulta);
                        ?>

                      <?php foreach ($ejec as $proyecto): ?>

                      <option value="<?php echo $proyecto['id_proyecto']  ?>"><?php echo $proyecto['nombre']?> - <?php echo $proyecto['contrato']?></option>

                      <?php endforeach ?>
                </select>
            </div>
            <!--MONTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><b>Q.</b> </span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Monto" id="MontoEgreso" name="MontoEgreso">
            </div>
            <!--DESCRIPCION-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-comment"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Descripcion" id="descripcionEgreso" name="descripcionEgreso">
            </div>
            <!--usuario-->
            <input hidden type="text" class="form-control" id="idUsuario" placeholder="" name="idUsuario">
                       
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Editar Egreso -->
<div class="modal fade" id="EditarEgresoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Modificar Egreso Monetario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/UpdateEgreso.php" method="POST">
        <input hidden type="text" class="form-control" id="NEgresoEdi" placeholder="" name="NEgresoEdi">
            <!--PROYECTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                </div>
                <select class="form-control" id="proyectoEgresoEdi" name="proyectoEgresoEdi">
                    <option>Seleccione Proyecto</option>
                    <?php
                       
                        $consulta ="SELECT * FROM proyecto";
                        $ejec=mysqli_query($conexion,$consulta);
                        ?>

                      <?php foreach ($ejec as $proyecto): ?>

                      <option value="<?php echo $proyecto['id_proyecto']  ?>"><?php echo $proyecto['nombre']?> - <?php echo $proyecto['contrato']?></option>

                      <?php endforeach ?>
                </select>
            </div>
            <!--MONTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><b>Q.</b> </span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Monto" id="MontoEgresoEdi" name="MontoEgresoEdi">
            </div>
            <!--DESCRIPCION-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-comment"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Descripcion" id="descripcionEgresoEdi" name="descripcionEgresoEdi">
            </div>
                       
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal Eliminar Egreso -->
<div class="modal fade" id="EliminarEgresoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Eliminar Egreso Monetario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/DeleteEgreso.php" method="POST">
        <input hidden type="text" class="form-control" id="idEgresoE" placeholder="" name="idEgresoE">
            <div class="input-group mb-3" style="justify-content: center; align-items: center;">
                <div class="input-group-prepend">
                    <img src="../img/danger.png" width="100px">
                  </div>
            </div>
            <h4 class="text-center">¿Desea Eliminar el Egreso Monetario?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">

//Boton Editar
$(document).on("click", "#botonEditarEgreso", function (){
    var IDEgr =$(this).data('id');
    var montoEgr =$(this).data('monto');
    var descripcionEgr =$(this).data('descri');

    $("#NEgresoEdi").val(IDEgr);
    $("#MontoEgresoEdi").val(montoEgr);
    $("#descripcionEgresoEdi").val(descripcionEgr);

  })

  //Boton Eliminar
$(document).on("click", "#botonEliminar", function (){
    var idEliminar =$(this).data('ide');

    $("#idEgresoE").val(idEliminar);

  })


//Boton Usuario
$(document).on("click", "#botonAgregar", function (){
    var idUsuario =$(this).data('idu');

    $("#idUsuario").val(idUsuario);

  })


    $(document).ready(function() {
    $('#egresos').DataTable({
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

