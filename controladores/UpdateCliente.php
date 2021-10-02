
<?php
     include '../modelos/conexion.php';

     $id = $_POST['idCliente'];
     $nombre = $_POST['nombreEditar'];
     $telefono = $_POST['telefonoEditar'];
     $direccion = $_POST['direccionEditar'];
     $nit = $_POST['nitEditar'];
     
     /*echo $id;
     echo $nombre;
     echo $telefono;
     echo $direccion;
     echo $nit;*/


        $sql = "UPDATE cliente SET nombre='$nombre', telefono='$telefono', direccion='$direccion', nit='$nit', estado=1 
                WHERE id_cliente='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Cliente modificado exitosamente'); 
                window.location.href='../vistas/clientes.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de modificar el cliente, intente de nuevo');
                window.location.href='../vistas/clientes.php'; 
                </script>"; 
                
            } 
?>

