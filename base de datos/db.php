<?php
    $servidor = "localhost";
    $usuario = "root";
    $contrasenna = "";
    $db = "pruebas";
    
    $conexion = mysqli_connect($servidor,$usuario,$contrasenna,$db);
    if(!$conexion){
        echo "todo fallo";
    }
?>