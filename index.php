<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Nasa Constructores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/7e73ebaf62.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <nav class="navbar ">
        <h2>SISTEMA NASA CONSTRUCTORES</h2>
        <H3>2,021</H3>
      </nav>
      
      <div class="wrapper">
        <form class="form-signin" action="controladores/login.php" method="POST">
            <img class="imglogo" src="img/logo2.jpg" height="160px">       
          <h2 class="form-signin-heading text-center">Inicio de Sesión</h2>
          <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario" required="" autofocus="" />
          <input type="password" class="form-control" name="password" placeholder="Ingrese Contraseña" required=""/>      
          <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Ingresar</button>   
        </form>
      </div>
      
        
        
      <div class="footer text-center">
          <p>© Néstor Antonio Sánchez Larios 2021</p>
      </div>
     
      

</body>
</html>

