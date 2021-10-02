<?php

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
  <div class="row">
    <div class="col-sm">
        <div class="jumbotron center">
            <h1 class="display-6 text-center">Proyectos</h1>
                <hr class="my-6">
                <p class="text-center">Información de Proyectos</p>
                <a class="btn btn-primary btn-block" href="proyectos.php" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>
    </div>
    <div class="col-sm">
        <div class="jumbotron">
            <h1 class="display-6 text-center">Clientes</h1>
                <hr class="my-6">
                <p class="text-center">Información de Clientes</p>
                <a class="btn btn-primary btn-block" href="clientes.php" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>  
    </div>
    <div class="col-sm">
        <div class="jumbotron">
            <h1 class="display-6 text-center">Ingresos</h1>
                <hr class="my-6">
                <p class="text-center">Información de Ingresos</p>
                <a class="btn btn-primary btn-block" href="ingresos.php" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>
    </div>
    <div class="col-sm">
        <div class="jumbotron">
            <h1 class="display-6 text-center">Egresos</h1>
                <hr class="my-6">
                <p class="text-center">Información de Egresos</p>
                <a class="btn btn-primary btn-block" href="egresos.php" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>
    </div>
    <div class="col-sm">
        <div class="jumbotron">
            <h1 class="display-6 text-center">Estado de Cuenta</h1>
                <hr class="my-6">
                <p class="text-center">Información de Estado de Cuenta</p>
                <a class="btn btn-primary btn-block" href="#" role="button"><i class="fas fa-search-plus"></i> Ver más</a>
        </div>
    </div>
  </div>
</div>




        <br>
        <br>
        
      <div class="footer text-center">
          <p>© Néstor Antonio Sánchez Larios 2021</p>
      </div>
     
      

</body>
</html>

