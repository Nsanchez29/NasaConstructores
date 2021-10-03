
<?php
     include '../modelos/conexion.php';

     $id = $_POST['idEgresoE'];


        $sql = "UPDATE egreso SET estado=0 
                WHERE id_egreso='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Egreso Monetario Eliminado exitosamente'); 
                window.location.href='../vistas/egresos.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de eliminar el Egreso Monetario, intente de nuevo');
                window.location.href='../vistas/egresos.php'; 
                </script>"; 
                
            } 
?>
