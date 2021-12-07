<?php

    include 'db.php';
    $id = $_GET['upd'];

    $sql = "DELETE FROM carrito WHERE id = '$id'";
    $ejecutar = mysqli_query($conexion, $sql);
        
    if($ejecutar){
        echo '
            <script>
                alert("Producto eliminado del carrito");
                window.location = "../cart/"
            </script>
        ';
        exit();
    }else{
        echo '
            <script>
                alert("No se elimino mano");
                window.location = "../view/usuario.php"
            </script>
        ';
        exit();
    }

?>