<?php
     include '../modelos/conexion.php';

     $id = $_POST['idTransf'];


        $sql = "UPDATE transferencia SET estado=0 
                WHERE id_transferencia='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Transferencia Eliminada exitosamente'); 
                window.location.href='../vistas/transferencias.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de eliminar la Transferencia, intente de nuevo');
                window.location.href='../vistas/transferencias.php'; 
                </script>"; 
                
            } 
?>