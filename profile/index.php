<?php
    include '../private/db.php';
    session_start();

    $Nombre = isset($_SESSION['datos']) ? $_SESSION['datos'] : 'NoHayDatos';
    $correo = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'NoHayDatos';
    $cont = isset($_SESSION['cont']) ? $_SESSION['cont'] : 'NoHayDatos';
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
    }else if($_SESSION['rol'] != 2){
        echo '
            <script>
                alert("Este no es tu rol carnal");
                window.location = "../login/index.html"
            </script>
        ';
        session_destroy();
        die();
    }
    
    $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : 'No ha buscado';
    $sql = "SELECT * FROM producto WHERE INSTR (nombre, '$buscar')";
    $ejecutar = mysqli_query($conexion, $sql);
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Nunito:wght@200;300;400;600;700;800;900&family=Oswald:wght@200;300;400;500;700&display=swap" rel="stylesheet">
  <link rel="icon" href="../assets/icons/user.png">
  <link rel="stylesheet" href="../theme/index.css">
  <link rel="stylesheet" href="./css/style.css?ts=<?=time()?>">
  <link rel="stylesheet" href="./css/styleL.css?ts=<?=time()?>" media="(min-width: 375px)">
  <link rel="stylesheet" href="./css/tablet.css?ts=<?=time()?>" media="(min-width: 768px)">
  <link rel="stylesheet" href="./css/desktop.css?ts=<?=time()?>" media="(min-width: 1024px)">
  <title>My Profile | Nexus</title>
</head>
<body>
  <header>
    <div class="btn-menu">
      <label for="btn-menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
      </label>
      <a class="header--logo" href="./">
        <img src="../assets/icons/logo.png" alt="Logo de Nexus Store"><h1>Mi cuenta</h1>
      </a>
    </div>
    <nav class="header__menu">
      <a href="../home/index.php" class="menu--home">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
          <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
        </svg><p>Inicio</p>
      </a>
      <a href="tel:+523333943613" class="menu--support">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
          <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
          <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg><p>Contacto</p>
      </a>
      <a href="../categories/" class="menu--gallery">
      <svg fill="currentColor" viewBox="0 0 16 16">
          <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
          <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"></path>
        </svg><p>Galería</p>
      </a>
      <a href="../cart/" class="menu--cart">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
        </svg><p>Carrito</p>
      </a>
    </nav>
	</header>
  <div class="capa"></div>
  <input type="checkbox" id="btn-menu">
  <div class="container__menu">
    <aside class="menu__cont">
      <nav>
        <h4>Categorías</h4>
        <a href="../categories/1/">Consolas</a>
        <a href="../categories/2/">Accesorios</a>
        <a href="../categories/3/">Videojuegos</a>
        <a href="../categories/4/">Promociones</a>
        <a href="../categories/5/">Edición Limitada</a>
      </nav>
      <label for="btn-menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
          <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
        </svg>
      </label>
    </aside>
  </div>
  <main>
    <div class="welcome-greeting">
      <h2>Bienvenido <?php echo $Nombre?></h2>
      <a href="./update/index.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
          <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"></path>
        </svg>
      </a>
      <a href="../private/cerrar_sesion.php" class="tam">Cerrar sesion</a>
    </div>
    <form action="" class="user__data-container">
      <div class="userD">
        <label for="nombre">Nombre:</label><input type="text" name="nombre" id="nombre" value="<?php echo $Nombre?>" readonly>
      </div>
      <div class="userD">
        <label for="correo">Correo:</label><input type="email" name="correo" id="correo" value="<?php echo $correo?>" readonly>
      </div>
      <div class="userD">
        <label for="contraseña">Contraseña:</label><input type="password" name="contraseña" id="contraseña" value="<?php echo $cont?>" readonly>
      </div>
    </form>
  </main>
</body>
</html>