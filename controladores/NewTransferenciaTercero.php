<?php
        include '../modelos/conexion.php';

            $idUsuario = $_POST['idUsuarioTercero'];
            $idUsuarioDestino = $_POST['usuarioDestino'];
            $monto = $_POST['MontoTransferenciaTercero'];
            $descripcion = $_POST['descripcionTransferenciaTercero'];
            $estado = 1;
            $tipo = "TERCEROS";
            $fecha = date("y/m/d");
            


                $sql = "INSERT INTO transferencia (id_usuario, id_usuariodest, monto, descripcion, fecha, tipo, estado) 
                                    VALUES ('$idUsuario', '$idUsuarioDestino', '$monto','$descripcion', '$fecha', '$tipo', '$estado')";
                    if (mysqli_query($conexion, $sql)) {
                        
                        echo "<script>
                        alert('Transferencia A Terceros documentada exitosamente'); 
                        window.location.href='../vistas/transferencias.php'; 
                        </script>";
                    } else {

                        echo "<script> 
                        alert('A ocurrido un error al momento de registrar la Transferencia A Terceros');
                        window.location.href='../vistas/transferencias.php'; 
                        </script>"; 
                        
                    }
                    
    

?>