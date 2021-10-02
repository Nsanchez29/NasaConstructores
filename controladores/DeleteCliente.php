
<?php
     include '../modelos/conexion.php';

     $id = $_POST['idClienteE'];


        $sql = "UPDATE cliente SET estado=0 
                WHERE id_cliente='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Cliente Eliminado exitosamente'); 
                window.location.href='../vistas/clientes.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de eliminar el cliente, intente de nuevo');
                window.location.href='../vistas/clientes.php'; 
                </script>"; 
                
            } 
?>

