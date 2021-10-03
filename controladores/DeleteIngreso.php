
<?php
     include '../modelos/conexion.php';

     $id = $_POST['idIngresoE'];


        $sql = "UPDATE ingreso SET estado=0 
                WHERE id_ingreso='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Ingreso Monetario Eliminado exitosamente'); 
                window.location.href='../vistas/ingresos.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de eliminar el Ingreso Monetario, intente de nuevo');
                window.location.href='../vistas/ingresos.php'; 
                </script>"; 
                
            } 
?>
