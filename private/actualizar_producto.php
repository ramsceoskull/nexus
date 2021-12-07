<?php

    include 'db.php';
    $id = $_GET['upd'];

    $cont = mysqli_query($conexion, "SELECT * FROM producto WHERE id = '$id' ");
    while ($row = $cont->fetch_assoc()) {
        $img = $row['img'];
    }

    $nombre = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $directorio = "../public/img/img-productos/";
    $archivo = $directorio . time() . basename($_FILES["file"]["name"]);
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $descuento = $_POST['descuento'];
    $plataforma = $_POST['plataforma'];
    $disponible = $_POST['disponible'];

    $desc = $precio * $descuento / 100;
    $precio_desc = $precio - $desc;

    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png"){
        if(!move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
            echo '
                <script>
                    alert("Hubo un error en la subida del archivo");
                    window.location = "../view/actualizar.php?upd='.$id.'"
                </script>
            ';
            exit();
        }
    }else if($tipoArchivo == "" ){
        $archivo = $img;
        $sql = "UPDATE producto SET nombre='$nombre', descripcion='$descripcion', precio='$precio', precio_desc='$precio_desc', img='$archivo', categoria='$categoria', marca='$marca', descuento='$descuento', plataforma='$plataforma', disponible='$disponible' WHERE id = '$id'";
        $ejecutar = mysqli_query($conexion, $sql);
            
        if($ejecutar){
            echo '
                <script>
                    alert("Producto guardado correctamente");
                    window.location = "../home/admin.php"
                </script>
            ';
            exit();
        }else{
            echo '
                <script>
                    alert("No se guardo mano");
                    window.location = "../home/admin.php"
                </script>
            ';
            exit();
        }
    }else{
        echo '
            <script>
                alert("Solo se admiten archivos jpg/jpeg/png");
                window.location = "../view/actualizar.php?upd='.$id.'"
            </script>
        ';
        exit();
    }

    

    
    $sql = "UPDATE producto SET nombre='$nombre', descripcion='$descripcion', precio='$precio', img='$archivo', categoria='$categoria' WHERE id = '$id'";
    $ejecutar = mysqli_query($conexion, $sql);
        
    if($ejecutar){
        echo '
            <script>
                alert("Producto guardado correctamente");
                window.location = "../home/admin.php"
            </script>
        ';
        unlink($img);
        exit();
    }else{
        echo '
            <script>
                alert("No se guardo mano");
                window.location = "../home/admin.php"
            </script>
        ';
        exit();
    }


?>