
<?php
     include '../modelos/conexion.php';

     $id = $_POST['idUsuario'];
     $nombre = $_POST['nombreEditar'];
     $usuario = $_POST['usuarioEditar'];
     $contrasena = $_POST['contrasenaEditar'];
     $rol = $_POST['rolEditar'];
     
     /*echo $id;
     echo $nombre;
     echo $usuario;
     echo $contrasena;
     echo $rol;*/

        $ContraHash = password_hash($contrasena, PASSWORD_BCRYPT);


        $sql = "UPDATE usuario SET nombre='$nombre', usuario='$usuario', password='$ContraHash', estado=1, id_rol='$rol' 
                WHERE id_usuario='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Usuario modificado exitosamente'); 
                window.location.href='../vistas/usuarios.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de modificar el usuario, intente de nuevo');
                window.location.href='../vistas/usuarios.php'; 
                </script>"; 
                
            } 
?>

