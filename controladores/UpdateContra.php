
<?php
     include '../modelos/conexion.php';

     $id = $_POST['idUsuario'];
     $contrasena = $_POST['contrasenaEditar'];
     $estado = 1;


        $ContraHash = password_hash($contrasena, PASSWORD_BCRYPT);


        $sql = "UPDATE usuario SET password='$ContraHash', estado ='$estado' 
                WHERE id_usuario='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Contraseña modificada exitosamente'); 
                window.location.href='../vistas/miperfil.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de modificar la contraseña, intente de nuevo');
                window.location.href='../vistas/miperfil.php'; 
                </script>"; 
                
            } 
?>

