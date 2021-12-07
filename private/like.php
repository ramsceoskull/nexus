<?php

    include 'db.php';
    $id = $_GET['upd'];

    $cont = mysqli_query($conexion, "SELECT * FROM producto WHERE id = '$id' ");
    while ($row = $cont->fetch_assoc()) {
        $like = $row['me_gusta'];
    }

    $like = $like + 1;
    sleep(2);
    
    $sql = "UPDATE producto SET me_gusta='$like' WHERE id = '$id'";
    $ejecutar = mysqli_query($conexion, $sql);
        
    if($ejecutar){
        header("location: ".$_SERVER['HTTP_REFERER'] ." ");

        exit();
    }
?>