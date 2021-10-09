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
    <h1 class="text-center" style="color: black;">ADMINISTRACIÓN DE USUARIOS</h1>
</div>

<br>    

<div class="container" style="background-color: white; padding: 25px;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usuariosModal">
    <i class="fas fa-plus-circle"></i> Agregar Nuevo Usuario
    </button>
    <br>
    <br>

    <table id="usuarios" class="table text-center table-responsive-lg">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Usuario</th>
      <th scope="col">Rol</th>
      <th scope="col">Estado</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $qusuario = "SELECT * FROM usuario";
  $resultado = mysqli_query($conexion,$qusuario);
  $i =0;
  while($row = mysqli_fetch_array($resultado)){
    $i ++;
    ?>
   
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['nombre'] ?></td>
      <td><?php echo $row['usuario'] ?></td>
      <td><?php 
      if($row['id_rol'] == 1){echo "Administrador";}
      else if($row['id_rol'] == 2){echo "Gerencia";}
      else{echo "Secretaria";} ?>
      </td>
      <td>
        <a class="btn 
        <?php if($row['estado'] == 1){
           echo "btn-success";}else{echo"btn-danger";} ?>
             btn" href="../controladores/estadoUsuario.php?UsuarioId=<?php echo $row['id_usuario']  ?>">
              <?php if($row['estado'] == 1){ 
                echo "<i class='fas fa-user-check'></i>";}
                else{echo"<i class='fas fa-user-times'></i>";} ?>
                </a>
      </td>
      
      <td> 
      <div class="" >

        <div role="group" aria-label="Third group">
        <button type="button" id="botonEditar" class="btn btn-warning" data-toggle="modal" data-target="#EditarUsuariosModal" 
        data-id="<?php echo $row['id_usuario'] ?>" data-nombre="<?php echo $row['nombre'] ?>" 
        data-usuario="<?php echo $row['usuario']?>">
        <i class="fas fa-pencil-alt"></i>
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
     


<!-- Modal Agregar Usuarios-->
<div class="modal fade" id="usuariosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Ingreso de Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/NewUsuarios.php" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su Nombre" >
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su Apellido">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su Usuario">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese su Contraseña">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                </div>
                <select class="form-control" id="rol" name="rol">
                    <option>Rol de Usuario</option>
                    <?php
                       
                        $consulta ="SELECT * FROM rol";
                        $ejec=mysqli_query($conexion,$consulta);
                        ?>

                      <?php foreach ($ejec as $roles): ?>

                      <option value="<?php echo $roles['id_rol']  ?>"><?php echo $roles['rol']?></option>

                      <?php endforeach ?>
                </select>
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


<!-- Modal Editar Usuarios-->
<div class="modal fade" id="EditarUsuariosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img src="../img/logo2.jpg" height="85px" width="130px">
        <h5 class="modal-title" style="margin-left: 10%; padding: 20px;" id="exampleModalLabel"> Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controladores/UpdateUsuario.php" method="POST">
        <input hidden type="text" class="form-control" id="idUsuario" placeholder="" name="idUsuario">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="nombreEditar" name="nombreEditar" placeholder="Ingrese su Nombre" >
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="usuarioEditar" name="usuarioEditar" placeholder="Ingrese su Usuario">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" id="contrasena" name="contrasenaEditar" placeholder="Ingrese su Contraseña">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                </div>
                <select class="form-control" id="rolEditar" name="rolEditar">
                    <option>Rol de Usuario</option>
                    <?php
                       
                        $consulta ="SELECT * FROM rol";
                        $ejec=mysqli_query($conexion,$consulta);
                        ?>

                      <?php foreach ($ejec as $roles): ?>

                      <option value="<?php echo $roles['id_rol']  ?>"><?php echo $roles['rol']?></option>

                      <?php endforeach ?>
                </select>
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





<script type="text/javascript">

//Boton Editar
$(document).on("click", "#botonEditar", function (){
    var id =$(this).data('id');
    var nombre =$(this).data('nombre');
    var usuario =$(this).data('usuario');

    $("#idUsuario").val(id);
    $("#nombreEditar").val(nombre);
    $("#usuarioEditar").val(usuario);

  })




//DataTable
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

