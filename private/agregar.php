<?php

    include 'db.php';
    session_start();

    $producto_id = $_GET['upd'];
    $usuario_id = $_SESSION['id'];
    
    $sql = "INSERT INTO carrito(usuario_id, producto_id) VALUES('$usuario_id','$producto_id')";

    $ejecutar = mysqli_query($conexion, $sql);
        
    if($ejecutar){
        echo '
            <script>
                alert("agregado al carrito");
                window.location = "../categories/"
            </script>
        ';
        exit();
    }else{
        echo '
            <script>
                alert("No se guardo mano");
                window.location = "../view/usuario.php"
            </script>
        ';
        exit();
    }

?>