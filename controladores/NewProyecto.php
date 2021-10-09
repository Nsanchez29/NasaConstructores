<?php
        include '../modelos/conexion.php';


            $nombre = $_POST['nombreP'];
            $departamento = $_POST['departamentos'];
            $municipio = $_POST['Listamunicipios'];
            $direccion = $_POST['direccionP'];
            $precio = $_POST['precioP'];
            $numContrato = $_POST['numContrato'];
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFin = $_POST['fechaFin'];
            $nog = $_POST['nogP'];
            $cliente = $_POST['cliente'];
            $estado = 1;
            $estadoproyecto = 1;
            
            /*echo $nombre;
            echo ' ';
            echo $departamento;
            echo ' ';
            echo $municipio;
            echo ' ';
            echo $direccion;
            echo ' ';
            echo $precio;
            echo ' ';
            echo $numContrato;
            echo ' ';
            echo $fechaInicio;
            echo ' ';
            echo $fechaFin;
            echo ' ';
            echo $nog;
            echo ' ';
            echo $cliente;
            echo ' ';
            echo $estado;*/

            
            //CONSULTAR SI EL PROYECTO EXISTE

            $consultaProyecto ="SELECT * FROM proyecto WHERE contrato = '$numContrato'";
            $ejec= mysqli_query($conexion,$consultaProyecto);

            if (mysqli_num_rows($ejec) != 0){

                echo "<script>
                alert('A ocurrido un error, el proyecto ya existe');
                window.location.href='../vistas/proyectos.php'; 
                </script>"; 
        

            }else{

                $sql = "INSERT INTO proyecto (id_cliente, nombre, municipio, departamento, direccion, precio, contrato, fecha_inicio, fecha_fin, nog, estadoproyecto, estado) 
                                    VALUES ('$cliente', '$nombre', '$municipio', '$departamento', '$direccion' , '$precio' , '$numContrato' ,
                                     '$fechaInicio', '$fechaFin', '$nog', '$estadoproyecto', '$estado')";
                    if (mysqli_query($conexion, $sql)) {
                        echo "<script>
                        alert('Proyecto creado exitosamente'); 
                        window.location.href='../vistas/proyectos.php'; 
                        </script>"; 
                    } else {

                        echo "<script> 
                        alert('A ocurrido un error al momento de ingresar el Proyecto');
                        window.location.href='../vistas/proyectos.php'; 
                        </script>"; 
                        
                    }
                    
            }
    

?>