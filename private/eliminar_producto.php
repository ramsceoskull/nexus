<?php

    include 'db.php';
    $id = $_GET['upd'];
    $cont = mysqli_query($conexion, "SELECT * FROM producto WHERE id = '$id' ");
    while ($row = $cont->fetch_assoc()) {
        $img = $row['img'];
    }

    $sql = "DELETE FROM producto WHERE id = '$id'";
    $ejecutar = mysqli_query($conexion, $sql);
        
    if($ejecutar){
        echo '
            <script>
                alert("Producto eliminado");
                window.location = "../home/admin.php"
            </script>
        ';
        unlink($img);
        exit();
    }else{
        echo '
            <script>
                alert("No se elimino mano");
                window.location = "../home/admin.php"
            </script>
        ';
        exit();
    }

?>