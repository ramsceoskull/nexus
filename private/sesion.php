<?php

    session_start();

    include 'db.php';

    $correo = $_POST['correo'];
    $contrasenna = $_POST['contrasenna'];
    $admin = "@#$%";
    
    
    $cont = mysqli_query($conexion, "SELECT * FROM sesion WHERE correo = '$correo' ");
    while ($row = $cont->fetch_assoc()) {
        $nombre = $row['nombre'];
        $id = $row['id'];
        $hash = $row['contrasenna'];
    }

    if(password_verify($contrasenna, $hash)){
        $contrasenna = $hash;
    }

    $validar = mysqli_query($conexion, "SELECT * FROM sesion WHERE correo = '$correo' and contrasenna = '$contrasenna'");

    if(mysqli_num_rows($validar) > 0){
        $_SESSION['cont'] = $_POST['contrasenna'];
        $_SESSION['usuario'] = $correo;
        $_SESSION['datos'] = $nombre;
        $_SESSION['id'] = $id; 
        if(substr_compare($nombre, $admin, -4, 4)==0){
            header("location: ../home/admin.php");
            $_SESSION['rol'] = 1;
            exit();
        }else{
            header("location: ../home/index.php");
            $_SESSION['rol'] = 2;
            exit();
        }
    }else{
        echo '
            <script>
                alert("El usuario no existe");
                window.location = "../login/index.html"
            </script>
        ';
        exit();
    }

    
?>