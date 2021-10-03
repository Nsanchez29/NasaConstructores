<?php
        include '../modelos/conexion.php';

            $idUsuario = $_POST['idUsuario'];
            $proyecto = $_POST['proyectoEgreso'];
            $monto = $_POST['MontoEgreso'];
            $descripcion = $_POST['descripcionEgreso'];
            $estado = 1;

            $fecha = date("y/m/d");
            


                $sql = "INSERT INTO egreso (proyecto, id_usuario, fecha, monto, descripcion, estado) 
                                    VALUES ('$proyecto', '$idUsuario', '$fecha','$monto', '$descripcion', '$estado')";
                    if (mysqli_query($conexion, $sql)) {
                        
                        echo "<script>
                        alert('Egreso creado exitosamente'); 
                        window.location.href='../vistas/egresos.php'; 
                        </script>";
                    } else {

                        echo "<script> 
                        alert('A ocurrido un error al momento de registrar el Egreso Monetario');
                        window.location.href='../vistas/egresos.php'; 
                        </script>"; 
                        
                    }
                    
    

?>