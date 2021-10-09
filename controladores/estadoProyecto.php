<?php  
include '../modelos/conexion.php';

$idProyecto=$_GET['ProyectoId'];

        $qP = "SELECT estadoproyecto FROM proyecto WHERE id_proyecto = $idProyecto";
         $ejecutar = mysqli_query($conexion, $qP);
         $estado = mysqli_fetch_array($ejecutar);


    if (!empty($idProyecto)){

     if($estado['estadoproyecto'] == 1)
     {
     
            $sql = "UPDATE proyecto SET estadoproyecto = 0 WHERE id_proyecto = $idProyecto";

                mysqli_query($conexion, $sql);
               
                header('Location: ../vistas/proyectos.php');

                
         }else{
            $sql = "UPDATE proyecto SET estadoproyecto = 1 WHERE id_proyecto = $idProyecto";

            mysqli_query($conexion, $sql);
            header('Location: ../vistas/proyectos.php');
            
        }
    
    }else{
    
    echo "<script> 
    Swal.fire({
        icon: 'error',
        title: 'A OCURRIDO UN ERROR',
        text: 'No se ha obtenido el Id del Proyecto'
      }) 
    window.location.href='../vistas/proyectos.php'; 
    </script>"; 
    
    }
?>