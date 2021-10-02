<?php
        include '../modelos/conexion.php';


            $nombre = $_POST['nombreCliente'];
            $telefono = $_POST['telefonoCliente'];
            $direccion = $_POST['direccionCliente'];
            $nit = $_POST['nitCliente'];
            $estado = 1;
            

            //CONSULTAR SI EL CLIENTE EXISTE

            $consultaCliente ="SELECT * FROM cliente WHERE nit = '$nit'";
            $ejec= mysqli_query($conexion,$consultaCliente);

            if (mysqli_num_rows($ejec) != 0){

                echo "<script>
                alert('A ocurrido un error, el cliente ya existe');
                window.location.href='../vistas/clientes.php'; 
                </script>"; 
        

            }else{

                $sql = "INSERT INTO cliente (nombre, telefono, direccion, nit, estado) 
                                    VALUES ('$nombre', '$telefono','$direccion', '$nit', 1)";
                    if (mysqli_query($conexion, $sql)) {
                        echo "<script>
                        alert('Cliente creado exitosamente'); 
                        window.location.href='../vistas/clientes.php'; 
                        </script>"; 
                    } else {

                        echo "<script> 
                        alert('A ocurrido un error al momento de ingresar el Cliente');
                        window.location.href='../vistas/clientes.php'; 
                        </script>"; 
                        
                    }
                    
            }
    

?>