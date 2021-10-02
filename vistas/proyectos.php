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
<!--<script src="../js/proyectos.js" type="text/javascript"></script>-->
</head>
<body>
    
<?php

    include "header/header.php"

?>

<br>

<div class="container">
    <h1 class="text-center" style="color: black;">ADMINISTRACIÓN DE PROYECTOS</h1>
</div>

<br>    

<div class="container" style="background-color: white; padding: 25px;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientesModal">
    <i class="fas fa-plus-circle"></i> Agregar Nuevo Proyecto
    </button>
    <br>
    <br>

    <table id="proy" class="table text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Ubicación</th>
      <th scope="col">Cliente</th>
      <th scope="col">Fecha Inicio</th>
      <th scope="col">Fecha Fin</th>
      <th scope="col">Contrato</th>
      <th scope="col">Precio</th>
      <th scope="col">Generar PDF</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $qproyecto = "SELECT p.id_proyecto as idproyecto, p.nombre as nombre, p.direccion as direccion, p.contrato as contrato, p.fecha_inicio as fechainicio, p.fecha_fin as fechafin,
  p.precio as precio, c.nombre as cliente  FROM proyecto p
  inner join cliente as c on p.id_cliente = c.id_cliente
  WHERE p.estado !=0";
  $resultado = mysqli_query($conexion,$qproyecto);
  $i =0;
  while($row = mysqli_fetch_array($resultado)){
    $i ++;
    ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['nombre'] ?></td>
      <td><?php echo $row['direccion'] ?></td>
      <td><?php echo $row['cliente'] ?></td>
      <td><?php echo $row['fechainicio'] ?></td>
      <td><?php echo $row['fechafin'] ?></td>
      <td><?php echo $row['contrato'] ?></td>
      <td><?php echo $row['precio'] ?></td>
      <td>
          <button class="btn btn-primary"><i class="fas fa-file-pdf"></i></button>
      </td>
      <td>
      <div role="group" aria-label="Third group">
        <button type="button" id="botonEditar" class="btn btn-warning" data-toggle="modal" data-target="#EditarProyectoModal"
        data-id="<?php echo $row['idproyecto'] ?>" data-nombre="<?php echo $row['nombre'] ?>" 
        data-direccion="<?php echo $row['direccion']?>" data-fechain="<?php echo $row['fechainicio']?>" 
        data-fechaf="<?php echo $row['fechafin']?>" data-contrato="<?php echo $row['contrato']?>" data-precio="<?php echo $row['precio']?>">
        <i class="fas fa-pencil-alt"></i>
        </button>
      </td>
      <td>
      <div role="group" aria-label="Third group">
      <button type="button" id="botonEliminar" class="btn btn-danger" data-toggle="modal" data-target="#EliminarProyectoModal"
        data-idp="<?php echo $row['idproyecto']  ?>">
        <i class="fas fa-trash-alt"></i>
        </button>
          </div>
      </td>
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
     


<!-- Modal Agregar-->
<div class="modal fade" id="clientesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Ingreso de Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/NewProyecto.php" method="POST">
          <!--NOMBRE PROYECTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Nombre del Proyecto" id="nombreP" name="nombreP">
            </div>
            <!--DEPARTAMENTO-->
            <div class="input-group mb-3" id="departament" name="departament">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map"></i></span>
                </div>
                <select class="form-control" id="departamentos" name="departamentos">
                    <?php include '../controladores/departamentos.php' ?>
                </select>
            </div>
            <!--MUNICIPIO-->
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                </div>
                <select class="form-control" id="Listamunicipios" name="Listamunicipios">
                    <option value="0">Seleccione un Municipio</option>
                </select>

            </div>
            <!--DIRECCION-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Direccion del Proyecto" id="direccionP" name="direccionP">
            </div>
            <!--PRECIO PROYECTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><b>Q.</b> </span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Precio de Proyecto" id="precioP" name="precioP">
            </div>
            <!--NUMERO DE CONTRATO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-archive"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Numero de Contrato" id="numContrato" name="numContrato">
            </div>
            <!--FECHA INICIO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" placeholder="Ingrese Fecha de Inicio" id="fechaInicio" name="fechaInicio">
            </div>
            <!--FECHA FIN-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" placeholder="Ingrese Fecha de Finalización" id="fechaFin" name="fechaFin">
            </div>
            <!--NOG-->
            <div class="input-group mb-3">
                <div class="input-group-prepend" id="nog" name="nog">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese NOG del Proyecto" id="nogP" name="nogP">
            </div>
            <!--CLIENTE-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <select class="form-control" id="cliente" name="cliente">
                    <option>Seleccione Cliente</option>
                    <?php
                       
                        $consulta ="SELECT * FROM cliente";
                        $ejec=mysqli_query($conexion,$consulta);
                        ?>

                      <?php foreach ($ejec as $clientes): ?>

                      <option value="<?php echo $clientes['id_cliente']  ?>"><?php echo $clientes['nombre']?></option>

                      <?php endforeach ?>
                </select>
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


<!-- Modal Editar Proyecto-->
<div class="modal fade" id="EditarProyectoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Editar Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/NewProyecto.php" method="POST">
          <!--NOMBRE PROYECTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Nombre del Proyecto" id="nombrePE" name="nombrePE">
            </div>
            <!--DEPARTAMENTO-->
            <div class="input-group mb-3" id="departament" name="departament">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map"></i></span>
                </div>
                <select class="form-control" id="departamentosE" name="departamentosE">
                    <?php include '../controladores/departamentos.php' ?>
                </select>
            </div>
            <!--MUNICIPIO-->
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                </div>
                <select class="form-control" id="ListamunicipiosE" name="ListamunicipiosE">
                    <option value="0">Seleccione un Municipio</option>
                </select>

            </div>
            <!--DIRECCION-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Direccion del Proyecto" id="direccionPE" name="direccionPE">
            </div>
            <!--PRECIO PROYECTO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><b>Q.</b> </span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Precio de Proyecto" id="precioPE" name="precioPE">
            </div>
            <!--NUMERO DE CONTRATO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-archive"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Numero de Contrato" id="numContratoE" name="numContratoE">
            </div>
            <!--FECHA INICIO-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" placeholder="Ingrese Fecha de Inicio" id="fechaInicioE" name="fechaInicioE">
            </div>
            <!--FECHA FIN-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" placeholder="Ingrese Fecha de Finalización" id="fechaFinE" name="fechaFinE">
            </div>
            <!--NOG-->
            <div class="input-group mb-3">
                <div class="input-group-prepend" id="nog" name="nog">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese NOG del Proyecto" id="nogPE" name="nogPE">
            </div>
            <!--CLIENTE-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <select class="form-control" id="clienteE" name="clienteE">
                    <option>Seleccione Cliente</option>
                    <?php
                       
                        $consulta ="SELECT * FROM cliente";
                        $ejec=mysqli_query($conexion,$consulta);
                        ?>

                      <?php foreach ($ejec as $clientes): ?>

                      <option value="<?php echo $clientes['id_cliente']  ?>"><?php echo $clientes['nombre']?></option>

                      <?php endforeach ?>
                </select>
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




<!-- Modal Eliminar Proyecto -->
<div class="modal fade" id="EliminarProyectoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Eliminar Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/DeleteProyecto.php" method="POST">
        <input hidden type="text" class="form-control" id="idProyectoE" placeholder="" name="idProyectoE">
            <div class="input-group mb-3" style="justify-content: center; align-items: center;">
                <div class="input-group-prepend">
                    <img src="../img/danger.png" width="100px">
                  </div>
            </div>
            <h4 class="text-center">¿Desea Eliminar el Proyecto?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script src="../js/proyectos.js"></script>
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
    var idElimina =$(this).data('idp');

    $("#idProyectoE").val(idElimina);

  })


//Datatable
    $(document).ready(function() {
    $('#proy').DataTable({
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

