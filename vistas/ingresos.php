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
    <h1 class="text-center" style="color: black;">INGRESOS</h1>
</div>

<br>    

<div class="container" style="background-color: white; padding: 25px;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingresoModal">
    <i class="fas fa-plus-circle"></i> Agregar Nuevo Ingreso Monetario
    </button>
    <br>
    <br>

    <table id="ingresos" class="table text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Proyecto</th>
      <th scope="col">Cliente</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Fecha</th>
      <th scope="col">Monto</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $qingreso = "SELECT i.id_ingreso as idingreso, p.nombre as nomproyecto, c.nombre as nomcliente, i.fecha as fecha, 
               i.monto as monto, i.descripcion as descripcion FROM ingreso i
               inner join proyecto as p on i.id_proyecto = p.id_proyecto
               inner join cliente as c on p.id_cliente = c.id_cliente
                WHERE i.estado !=0";
  $resultado = mysqli_query($conexion,$qingreso);
  $i =0;
  while($ingreso = mysqli_fetch_array($resultado)){
    $i ++;
    ?>
   
    <tr>
    <th scope="row"><?php echo $i ?></th>
      <td><?php echo $ingreso['nomproyecto'] ?></td>
      <td><?php echo $ingreso['nomcliente'] ?></td>
      <td><?php echo $ingreso['descripcion'] ?></td>
      <td><?php echo $ingreso['fecha'] ?></td>
      <td><?php echo $ingreso['monto'] ?></td>
      <td> 
      <div class="" >

        <div role="group" aria-label="Third group">
        <button type="button" id="botonEditar" class="btn btn-warning" data-toggle="modal" data-target="#EditarIngresoModal"
        data-id="<?php echo $ingreso['idingreso']?>" data-monto="<?php echo $ingreso['monto']?>"
         data-descri="<?php echo $ingreso['descripcion']?>">
        <i class="fas fa-pencil-alt"></i>
        </button>
            </div>
            </td>
      <td>
      <div role="group" aria-label="Third group">
        <button type="button" id="botonEliminar" class="btn btn-danger" data-toggle="modal" data-target="#EliminarIngresoModal"
        data-idi="<?php echo $ingreso['idingreso']  ?>">
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
<div class="modal fade" id="ingresoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Ingreso Monetario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/NewIngreso.php" method="POST">

            <!--PROYECTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                </div>
                <select class="form-control" id="proyecto" name="proyecto">
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
                <input type="text" class="form-control" placeholder="Ingrese Monto" id="Monto" name="Monto">
            </div>
            <!--DESCRIPCION-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-comment"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Descripcion" id="descripcion" name="descripcion">
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


<!-- Modal Editar Ingreso -->
<div class="modal fade" id="EditarIngresoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Modificar Ingreso Monetario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/UpdateIngreso.php" method="POST">
        <input hidden type="text" class="form-control" id="idIngresoEdi" placeholder="" name="idIngresoEdi">
            <!--PROYECTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                </div>
                <select class="form-control" id="proyectoEdi" name="proyectoEdi">
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
                <input type="text" class="form-control" placeholder="Ingrese Monto" id="MontoEdi" name="MontoEdi">
            </div>
            <!--DESCRIPCION-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-comment"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Descripcion" id="descripcionEdi" name="descripcionEdi">
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



<!-- Modal Eliminar Ingreso -->
<div class="modal fade" id="EliminarIngresoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Eliminar Ingreso Monetario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/DeleteIngreso.php" method="POST">
        <input hidden type="text" class="form-control" id="idIngresoE" placeholder="" name="idIngresoE">
            <div class="input-group mb-3" style="justify-content: center; align-items: center;">
                <div class="input-group-prepend">
                    <img src="../img/danger.png" width="100px">
                  </div>
            </div>
            <h4 class="text-center">¿Desea Eliminar el Ingreso Monetario?</h4>
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
$(document).on("click", "#botonEditar", function (){
    var id =$(this).data('id');
    var monto =$(this).data('monto');
    var descripcion =$(this).data('descri');

    $("#idIngresoEdi").val(id);
    $("#MontoEdi").val(monto);
    $("#descripcionEdi").val(descripcion);

  })


  //Boton Eliminar
$(document).on("click", "#botonEliminar", function (){
    var idEliminar =$(this).data('idi');

    $("#idIngresoE").val(idEliminar);

  })


    //DataTable
    $(document).ready(function() {
    $('#ingresos').DataTable({
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

