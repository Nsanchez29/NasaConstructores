
<?php
     include '../modelos/conexion.php';

     $id = $_POST['idIngresoEdi'];
     $proyecto = $_POST['proyectoEdi'];
     $monto = $_POST['MontoEdi'];
     $descripcion = $_POST['descripcionEdi'];
     
     /*echo $id;
     echo $nombre;
     echo $telefono;
     echo $direccion;
     echo $nit;*/


        $sql = "UPDATE ingreso SET id_proyecto='$proyecto', monto='$monto', descripcion='$descripcion' 
                WHERE id_ingreso='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Ingreso Monetario modificado exitosamente'); 
                window.location.href='../vistas/ingresos.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de modificar el Ingreso Monetario, intente de nuevo');
                window.location.href='../vistas/ingresos.php'; 
                </script>"; 
                
            } 
?>
