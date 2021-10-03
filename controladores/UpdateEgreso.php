
<?php
     include '../modelos/conexion.php';

     $id = $_POST['NEgresoEdi'];
     $proyecto = $_POST['proyectoEgresoEdi'];
     $monto = $_POST['MontoEgresoEdi'];
     $descripcion = $_POST['descripcionEgresoEdi'];


        $sql = "UPDATE egreso SET proyecto='$proyecto', monto='$monto', descripcion='$descripcion' 
                WHERE id_egreso='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Egreso Monetario modificado exitosamente'); 
                window.location.href='../vistas/egresos.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de modificar el Egreso Monetario, intente de nuevo');
                window.location.href='../vistas/egresos.php'; 
                </script>"; 
                
            } 
?>
