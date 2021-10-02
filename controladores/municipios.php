<?php

        //echo '<option>Municipio de prueba</option>';

        include '../modelos/conexion.php';
        
        $id_departamento = $_GET['paramid'];

        //echo $id_departamento;
        
        $consulta="SELECT * FROM municipio WHERE id_departamento = $id_departamento";
        $result=mysqli_query($conexion,$consulta);


        while($municipios = mysqli_fetch_array($result)){

                echo '<option value="'.$municipios['id_municipio'].'">'.$municipios['municipio'].'</option>';
            
        } 
        


?>