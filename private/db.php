<?php
    $servidor = "localhost";
    $usuario = "root";
    $contrasenna = "";
    $db = "pruebas";

      /*pruebas.freeoda.com 
    
        $servidor = "localhost";
        $usuario = "321593";
        $contrasenna = "15218390";
        $db = "321593";
    */
    
    $conexion = mysqli_connect($servidor,$usuario,$contrasenna,$db);
    if(!$conexion){
        echo "todo fallo";
    }
?>