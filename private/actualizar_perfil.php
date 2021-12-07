<?php

    include 'db.php';
    $ID = isset($_SESSION['id']) ? $_SESSION['id'] : 'NoHayDatos';
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasenna = $_POST['contrasenna'];
    $contrasenna = password_hash($contrasenna, PASSWORD_DEFAULT, ['cost' => 10]);

    $verificar = mysqli_query($conexion, "SELECT * FROM sesion WHERE correo ='$correo'");

    
    $sql = "UPDATE sesion SET nombre='$nombre', correo='$correo', contrasenna='$contrasenna' WHERE id = '$ID'";
    $ejecutar = mysqli_query($conexion, $sql);
        
    if($ejecutar){
        echo '
            <script>
                alert("Datos almacenados");
                window.location = "../profile/index.php"
            </script>
        ';
        exit();
    }else{
        echo '
            <script>
                alert("No se guardo mano");
                window.location = "../profile/index.php"
            </script>
        ';
        exit();
    }


?>