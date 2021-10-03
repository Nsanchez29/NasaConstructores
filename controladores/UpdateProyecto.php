
<?php
     include '../modelos/conexion.php';

     $id = $_POST['idPE'];
     $nombre = $_POST['nombrePE'];
     $departamento = $_POST['departamentosE'];
     $municipio = $_POST['ListamunicipiosE'];
     $direccion = $_POST['direccionPE'];
     $precio = $_POST['precioPE'];
     $numContrato = $_POST['numContratoE'];
     $fechaInicio = $_POST['fechaInicioE'];
     $fechaFin = $_POST['fechaFinE'];
     $nog = $_POST['nogPE'];
     $cliente = $_POST['clienteE'];
     $estado = 1;



        $sql = "UPDATE proyecto SET id_cliente='$cliente', nombre='$nombre', municipio='$municipio', departamento='$departamento',
         direccion='$direccion', precio='$precio', contrato='$numContrato', fecha_inicio='$fechaInicio',
         fecha_fin='$fechaFin', nog='$nog', estado='$estado' 
                WHERE id_proyecto='$id'";
        $ejecu= mysqli_query($conexion,$sql);

            if ($ejecu) {
                echo "<script>
                alert('Proyecto modificado exitosamente'); 
                window.location.href='../vistas/proyectos.php'; 
                </script>"; 
            } else {

                echo "<script> 
                alert('A ocurrido un error al momento de modificar el proyecto, intente de nuevo');
                window.location.href='../vistas/proyectos.php'; 
                </script>"; 
                
            } 
?>
