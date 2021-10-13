<?php

    session_start();

    include 'db.php';

    $correo = $_POST['correo'];
    $contrasenna = $_POST['contrasenna'];
    
    $cont = mysqli_query($conexion, "SELECT * FROM sesion WHERE correo = '$correo' ");
    while ($row = $cont->fetch_assoc()) {
        $nombre = $row['nombre'];
        $hash = $row['contrasenna'];
    }

    if(password_verify($contrasenna, $hash)){
        $contrasenna = $hash;
    }

    $validar = mysqli_query($conexion, "SELECT * FROM sesion WHERE correo = '$correo' and contrasenna = '$contrasenna'");

    if(mysqli_num_rows($validar) > 0){
        $_SESSION['usuario'] = $correo;
        $_SESSION['datos'] = $nombre;
        header("location: ../home/");
        exit();
    }else{
        echo '
            <script>
                alert("El usuario no existe");
                window.location = "../signup/"
            </script>
        ';
        exit();
    }

    
?>