<?php

    include 'db.php';

    session_start();

    $id = isset($_SESSION['id']) ? $_SESSION['id'] : 'NoHayDatos';
    $nombre = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $directorio = "../categories/img/";
    $archivo = $directorio .  time() . basename($_FILES["file"]["name"]);
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $plataforma = $_POST['plataforma'];
    $disponible = $_POST['disponible'];
    $descuento = 0;

    $sql = "INSERT INTO producto(nombre, descripcion, precio, img, categoria, marca, descuento, plataforma, disponible) VALUES('$nombre','$descripcion','$precio','$archivo','$categoria','$marca','$descuento','$plataforma', '$disponible')";


    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png"){
        if(!move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
            echo '
                <script>
                    alert("Hubo un error en la subida del archivo");
                    
                </script>
            ';
            exit();
        }
    }else{
        echo '
            <script>
                alert("Solo se admiten archivos jpg/jpeg/png");
                window.location = "../view/producto.html"
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $sql);
        
    if($ejecutar){
        echo '
            <script>
                alert("Producto almacenado correctamente");
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


?>