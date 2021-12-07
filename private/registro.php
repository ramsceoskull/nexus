<?php
    include 'db.php';

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasenna = $_POST['contrasenna'];
    $contrasenna = password_hash($contrasenna, PASSWORD_DEFAULT, ['cost' => 10]);

    $sql = "INSERT INTO sesion(nombre, correo, contrasenna) VALUES('$nombre','$correo','$contrasenna')";

    $verificar = mysqli_query($conexion, "SELECT * FROM sesion WHERE correo ='$correo'");

    if(mysqli_num_rows($verificar) > 0){
        echo '
            <script>
                alert("El correo ya existe");
                window.location = "../signup/index.html"
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $sql);
        
    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado correctamente");
                window.location = "../login/index.html"
            </script>
        ';
    }

    


?>