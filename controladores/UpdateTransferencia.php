
<?php
     include '../modelos/conexion.php';

     $id = $_POST['IdTransEdi'];
     $monto = $_POST['MontoTransEdi'];
     $descripcion = $_POST['descripcionTransEdi'];


        $sql = "UPDATE transferencia SET monto='$monto', descripcion='$descripcion' 
                WHERE id_transferencia='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Transferencia modificada exitosamente'); 
                window.location.href='../vistas/transferencias.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de modificar la Transferencia, intente de nuevo');
                window.location.href='../vistas/transferencias.php'; 
                </script>"; 
                
            } 
?>
