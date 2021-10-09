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
    <h1 class="text-center" style="color: black;">ADMINISTRACIÓN DE CLIENTES</h1>
</div>

<br>    

<div class="container" style="background-color: white; padding: 25px;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientesModal">
    <i class="fas fa-plus-circle"></i> Agregar Nuevo Cliente
    </button>
    <br>
    <br>

    <table id="clientes" class="table text-center table-responsive-lg">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Dirección</th>
      <th scope="col">Nit</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $qusuario = "SELECT * FROM cliente WHERE estado !=0";
  $resultado = mysqli_query($conexion,$qusuario);
  $i =0;
  while($row = mysqli_fetch_array($resultado)){
    $i ++;
    ?>
   
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['nombre'] ?></td>
      <td><?php echo $row['telefono'] ?></td>
      <td><?php echo $row['direccion'] ?></td>
      <td><?php echo $row['nit'] ?></td>
      <td> 
      <div class="" >

        <div role="group" aria-label="Third group">
        <button type="button" id="botonEditar" class="btn btn-warning" data-toggle="modal" data-target="#EditarClienteModal" 
        data-id="<?php echo $row['id_cliente'] ?>" data-nombre="<?php echo $row['nombre'] ?>" 
        data-telefono="<?php echo $row['telefono']?>" data-direccion="<?php echo $row['direccion']?>" 
        data-nit="<?php echo $row['nit']?>">
        <i class="fas fa-pencil-alt"></i>
        </button>
            </div>
            </td>
      <td>
      <div role="group" aria-label="Third group">
        <button type="button" id="botonEliminar" class="btn btn-danger" data-toggle="modal" data-target="#EliminarClienteModal"
        data-idc="<?php echo $row['id_cliente']  ?>">
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
<div class="modal fade" id="clientesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Ingreso de Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/NewCliente.php" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su Nombre" id="nombreCliente" name="nombreCliente">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                </div>
                <input type="number" class="form-control" placeholder="Ingrese su Número de Teléfono" id="telefonoCliente" name="telefonoCliente">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su Direccion" id="direccionCliente" name="direccionCliente">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su NIT" id="nitCliente" name="nitCliente">
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


<!-- Modal Editar Cliente -->
<div class="modal fade" id="EditarClienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Modificar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/UpdateCliente.php" method="POST">
        <input hidden type="text" class="form-control" id="idCliente" placeholder="" name="idCliente">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su Nombre" id="nombreEditar" name="nombreEditar">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                </div>
                <input type="number" class="form-control" placeholder="Ingrese su Número de Teléfono" id="telefonoEditar" name="telefonoEditar">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su Direccion" id="direccionEditar" name="direccionEditar">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su NIT" id="nitEditar" name="nitEditar">
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



<!-- Modal Eliminar Cliente -->
<div class="modal fade" id="EliminarClienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Eliminar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/DeleteCliente.php" method="POST">
        <input hidden type="text" class="form-control" id="idClienteE" placeholder="" name="idClienteE">
            <div class="input-group mb-3" style="justify-content: center; align-items: center;">
                <div class="input-group-prepend">
                    <img src="../img/danger.png" width="100px">
                  </div>
            </div>
            <h4 class="text-center">¿Desea Eliminar el Cliente?</h4>
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
    var nombre =$(this).data('nombre');
    var telefono =$(this).data('telefono');
    var direccion =$(this).data('direccion');
    var nit =$(this).data('nit');

    $("#idCliente").val(id);
    $("#nombreEditar").val(nombre);
    $("#telefonoEditar").val(telefono);
    $("#direccionEditar").val(direccion);
    $("#nitEditar").val(nit);

  })


  //Boton Eliminar
$(document).on("click", "#botonEliminar", function (){
    var idEliminar =$(this).data('idc');

    $("#idClienteE").val(idEliminar);

  })


    //DataTable
    $(document).ready(function() {
    $('#clientes').DataTable({
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

