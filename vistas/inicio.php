<?php

include '../modelos/conexion.php';


//INICIA LA SESION EN EL SISTEMA
session_start();
//SI EXISTEN DATOS PARA INICIAR LA SESION SE OBTIENEN LAS VARIABLES SIGUIENTES
if (isset($_SESSION['nombreUsuario'])){
  
    $nombreU = $_SESSION['nombreUsuario'];
    $IdUsuario = $_SESSION['UsuarioId'];
    $rolUsuario= $_SESSION['rolUsuario']; 
  
}else{

    header("location:../vistas/miperfil.php"); 

}

    
?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php

include "header/directorio.php"

?>
</head>
<body>
    
<?php

    include "header/header.php"

?>

<br>

<div class="container">
    <h1 class="text-center" style="color: black;">SISTEMA NASA CONSTRUCTORES</h1>
    
</div>

<br>    

<div class="container" style="background-color: white; padding: 25px;">
<?php

if($rolUsuario==1){
    include 'inicioadmin.php';
}elseif($rolUsuario==2){
    include 'iniciogerente.php';
}else{
    include 'iniciosecretaria.php';
}

?>
</div>




        <br>
        <br>
        
      <div class="footer text-center">
          <p>© Néstor Antonio Sánchez Larios 2021</p>
      </div>
     
      

</body>
</html>

