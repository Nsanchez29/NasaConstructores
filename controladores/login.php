<?php

require_once "../modelos/conexion.php";

session_start();


    if(isset($_POST['usuario']) && isset($_POST['password'])){
        $usuario = $_POST['usuario'];
        $password =$_POST['password'];


        $consulta ="SELECT id_usuario,nombre, usuario, password,estado,id_rol FROM usuario WHERE usuario = '$usuario'";
            $ejec=mysqli_query($conexion,$consulta);
            $arrayLogin = mysqli_fetch_array($ejec);
           
            if(!is_null($arrayLogin)){
                
                $idusuario = $arrayLogin['id_usuario'];
                $nombre = $arrayLogin['nombre'];
                $usuario = $arrayLogin['usuario'];
                $contrasena = $arrayLogin['password'];
                $estado = $arrayLogin['estado'];
                $rol = $arrayLogin['id_rol'];

                /*echo $contrasena;*/
            
             if($estado == 1){

                    if (password_verify($password, $contrasena)) {
                       
                        // VARIABLE DE SESION PARA OBTENER LOS DATOS
                        session_start();
                        
                         $_SESSION['UsuarioId'] = $idusuario;
                         $_SESSION['nombreUsuario'] = $nombre;
                         $_SESSION['rolUsuario'] = $rol;


                                echo "<script> 
                                    alert('Bienvenido al Sistema de NASA CONSTRUCTORES'); 
                                    window.location.href='../vistas/inicio.php'; 
                                </script>";
                    
                    } else {
                        
                        echo "<script> 
                        alert('Los datos son incorrectos, ingreselos nuevamente.'); 
                        window.location.href='../index.php'; 
                        </script>"; 
                    }              
                }else{

                    echo "<script> 
                alert('Comunicarse con el Administrador, el usuario se encuentra desactivado.'); 
                window.location.href='../index.php'; 
                </script>"; 
                }           
            }else{
                  echo "<script> 
                alert('Este Usuario no existe en la Base de Datos'); 
                window.location.href='../index.php'; 
                </script>"; 
            }
        }
?>