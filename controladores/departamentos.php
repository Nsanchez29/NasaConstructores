<?php
        include '../modelos/conexion.php';

    
            
        $sql="SELECT * FROM departamento";
        $result=mysqli_query($conexion,$sql);

        while($departamentos = mysqli_fetch_array($result)){

            echo "<option value='".$departamentos['id_departamento']."'>".$departamentos['departamento']."</option>";

        } 

?>