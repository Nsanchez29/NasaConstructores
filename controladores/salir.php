<?php
     
     session_start();

     session_destroy();
     
     echo '<script> alert("Cerrando Sesión");
                 location.href = "../index.php"; 
                 </script>';
     
     die();

?>