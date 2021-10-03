<?php
        include '../modelos/conexion.php';


            $proyecto = $_POST['proyecto'];
            $monto = $_POST['Monto'];
            $descripcion = $_POST['descripcion'];
            $estado = 1;

            $fecha = date("y/m/d");
            


                $sql = "INSERT INTO ingreso (id_proyecto, fecha, monto, descripcion, estado) 
                                    VALUES ('$proyecto', '$fecha','$monto', '$descripcion', '$estado')";
                    if (mysqli_query($conexion, $sql)) {
                        echo "<script>
                        alert('Ingreso creado exitosamente'); 
                        window.location.href='../vistas/ingresos.php'; 
                        </script>"; 
                    } else {

                        echo "<script> 
                        alert('A ocurrido un error al momento de registrar el Ingreso Monetario');
                        window.location.href='../vistas/ingresos.php'; 
                        </script>"; 
                        
                    }
                    
    

?>