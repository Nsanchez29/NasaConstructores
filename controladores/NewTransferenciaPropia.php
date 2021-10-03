<?php
        include '../modelos/conexion.php';

            $idUsuario = $_POST['idUsuario'];
            $monto = $_POST['MontoTPropia'];
            $descripcion = $_POST['descripcionTPropia'];
            $estado = 1;
            $tipo = "PROPIA";
            $fecha = date("y/m/d");
            


                $sql = "INSERT INTO transferencia (id_usuario, id_usuariodest, monto, descripcion, fecha, tipo, estado) 
                                    VALUES ('$idUsuario', '$idUsuario', '$monto','$descripcion', '$fecha', '$tipo', '$estado')";
                    if (mysqli_query($conexion, $sql)) {
                        
                        echo "<script>
                        alert('Transferencia Propia documentada exitosamente'); 
                        window.location.href='../vistas/transferencias.php'; 
                        </script>";
                    } else {

                        echo "<script> 
                        alert('A ocurrido un error al momento de registrar la Transferencia Propia');
                        window.location.href='../vistas/transferencias.php'; 
                        </script>"; 
                        
                    }
                    
    

?>