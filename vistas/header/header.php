<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-dark">
            <img src="../img/logonasa.png" height="65px">    
        </a>
        <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
        <a href="inicio.php" class="btn btn-primary" style="margin-right: 5px;"><i class="fas fa-home"></i> Inicio</a>
            <?php
                if($rolUsuario==1){
                    include 'headerAdmin.php';
                }elseif($rolUsuario==2){
                    include 'headerGerente.php';
                }else{
                    include 'headerSecretaria.php';
                }
            ?>
            <span>
                <a class="btn btn-danger" href="../controladores/salir.php"><i class="fas fa-power-off"></i> Salir</a>
            </span>
        </div>
        <br>
        
        
    </nav>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Bienvenido <b><?php echo $nombreU; ?></b></span>
            <h4 class="text-center" style="color: black;"><?php 
            date_default_timezone_set("America/Guatemala");
            echo date("d/m/Y") ?></h4>
        </div>
    </nav>
    
</div>