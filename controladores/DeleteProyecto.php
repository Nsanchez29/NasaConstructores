<?php
     include '../modelos/conexion.php';

     $id = $_POST['idProyectoE'];


        $sql = "UPDATE proyecto SET estado=0 
                WHERE id_proyecto='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Proyecto Eliminado exitosamente'); 
                window.location.href='../vistas/proyectos.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de eliminar el proyecto, intente de nuevo');
                window.location.href='../vistas/proyectos.php'; 
                </script>"; 
                
            } 
?>