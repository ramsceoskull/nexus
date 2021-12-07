<?php
    include '../private/db.php';
    session_start();

    $Nombre = isset($_SESSION['datos']) ? $_SESSION['datos'] : 'NoHayDatos';
    $ID = isset($_SESSION['id']) ? $_SESSION['id'] : 'NoHayDatos';
    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor, inicia tu sesion");
                window.location = "../login/index.html"
            </script>
        ';
        session_destroy();
        die();
    }else if($_SESSION['rol'] != 1){
        echo '
            <script>
                alert("Este no es tu rol carnal");
                window.location = "../login/index.html"
            </script>
        ';
        session_destroy();
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css?ts=<?=time()?>">
    <title>Document</title>
</head>
<body>
    <header class="si">
        
        <div class="header--logo">
            <p class="nombre">Hola <?php echo $Nombre?>!</p>
            <img src="../assets/icons/logo.png" class="logo">
        </div>
        
       
        <nav class="nav">
			<ul class="nav__ul">
				<li class="nav__li"><a href="../view/producto.html">Crear</a></li>
				<li class="nav__li"><a href="../private/cerrar_sesion.php">Cerrar sesion</a></li>
			</ul>
		</nav>
    </header>

    <main>
        
        

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Precio con descuento</th>
                    <th>IMG</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Plataforma</th>
                    <th>Like</th>
                    <th>Descuento</th>
                    <th>Disponible</th>
                    <th>Edicion</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    $cont = mysqli_query($conexion, "SELECT * FROM producto");
                    while ($row = $cont->fetch_assoc()) {
                ?>
                        <tr>
                <?php
                            $id= $row['id'];
                            $nombre = $row['nombre'];
                            $descripcion = $row['descripcion'];
                            $precio = $row['precio'];
                            $img = $row['img'];
                            $cat = $row['categoria'];
                            $marca = $row['marca'];
                            $like = $row['me_gusta'];
                            $descuento = $row['descuento'];
                            $plataforma = $row['plataforma'];
                            $disponible = $row['disponible'];
                            $precio_desc = $row['precio_desc'];
                            
                
                            echo '<td data-label="Nombre">'.$nombre.'</td>';
                            echo '<td data-label="Descripcion"><textarea>'.$descripcion.'</textarea></td>';
                            echo '<td data-label="Precio">'.$precio.'</td>';
                            echo '<td data-label="Precio con descuento">'.$precio_desc.'</td>';
                            echo '<td data-label="IMG"><img class="img" src="'.$img.'"></td>';
                            echo '<td data-label="Categoria">'.$cat.'</td>';
                            echo '<td data-label="Marca">'.$marca.'</td>';
                            echo '<td data-label="Plataforma">'.$plataforma.'</td>';
                            echo '<td data-label="Like">'.$like.'</td>';
                            echo '<td data-label="Descuento">'.$descuento.'</td>';
                            echo '<td data-label="Disponible">'.$disponible.'</td>';
                            echo '<td data-label="Edicion" class="btn"><a href="../private/eliminar_producto.php?upd='.$id.'"><input type="button" value="Eliminar" class="btn-eliminar"></a>';
                            echo '<a href="../view/actualizar.php?upd='.$id.'"><input type="button" value="Editar" class="btn-editar"></a></td>';
                        
                        ?>
                        </tr>
                <?php
                    }
                ?>
                
            </tbody>
        </table>
    </div>

    </main>

</body>
</html>