<?php
        include '../modelos/conexion.php';


            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            $rol = $_POST['rol'];

            $nombreCompleto = $nombre . " " . $apellido;

            //echo $nombreCompleto;
            

            //CONSULTAR SI EL USUARIO EXISTE

            $consultaUsuario ="SELECT * FROM usuario WHERE usuario = '$usuario'";
            $ejec= mysqli_query($conexion,$consultaUsuario);

            if (mysqli_num_rows($ejec) != 0){

                echo "<script>
                alert('A ocurrido un error, el usuario ya existe');
                window.location.href='../vistas/usuarios.php'; 
                </script>"; 
        

            }else{
                $Contra = password_hash($contrasena, PASSWORD_BCRYPT);

                

                $sql = "INSERT INTO usuario (nombre, usuario, password, estado, id_rol) 
                                    VALUES ('$nombreCompleto', '$usuario','$ContraHash', 1, $rol)";
                    if (mysqli_query($conexion, $sql)) {
                        echo "<script>
                        alert('Usuario creado exitosamente'); 
                        window.location.href='../vistas/usuarios.php'; 
                        </script>"; 
                    } else {

                        echo "<script> 
                        alert('A ocurrido un error al momento de ingresar el usuario');
                        window.location.href='../vistas/usuarios.php'; 
                        </script>"; 
                        
                    }
                    
            }
    

?>