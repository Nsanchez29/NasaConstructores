<?php  
include '../modelos/conexion.php';

$idUsuario=$_GET['UsuarioId'];

        $q = "SELECT estado FROM usuario WHERE id_usuario = $idUsuario";
         $ejecutar = mysqli_query($conexion, $q);
         $estado = mysqli_fetch_array($ejecutar);


    if (!empty($idUsuario)){

     if($estado['estado'] == 1)
     {
     
            $sql = "UPDATE usuario SET estado = 0 WHERE id_usuario = $idUsuario";

                mysqli_query($conexion, $sql);
               
                header('Location: ../vistas/usuarios.php');

                
         }else{
            $sql = "UPDATE usuario SET estado = 1 WHERE id_usuario = $idUsuario";

            mysqli_query($conexion, $sql);
            header('Location: ../vistas/usuarios.php');
            
        }
    
    }else{
    
    echo "<script> 
    Swal.fire({
        icon: 'error',
        title: 'A OCURRIDO UN ERROR',
        text: 'No se ha obtenido el Id del Usuario'
      }) 
    window.location.href='../vistas/usuarios.php'; 
    </script>"; 
    
    }
?>