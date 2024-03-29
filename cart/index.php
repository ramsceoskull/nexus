<?php
    include '../private/db.php';
    session_start();

    $Nombre = isset($_SESSION['datos']) ? $_SESSION['datos'] : 'NoHayDatos';
    $ID = isset($_SESSION['id']) ? $_SESSION['id'] : 'NoHayDatos';
    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor, inicia tu sesion");
                window.location = "../home/index.php"
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


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Nunito:wght@200;300;400;600;700;800;900&family=Oswald:wght@200;300;400;500;700&display=swap" rel="stylesheet">
  <link rel="icon" href="../assets/svg/cart-black.svg">
  <link rel="stylesheet" href="../theme/index.css">
  <link rel="stylesheet" href="./css/style.css?ts=<?=time()?>">
  <link rel="stylesheet" href="./css/styleL.css?ts=<?=time()?>" media="(min-width: 375px)">
  <link rel="stylesheet" href="./css/tablet.css?ts=<?=time()?>" media="(min-width: 768px)">
  <link rel="stylesheet" href="./css/desktop.css?ts=<?=time()?>" media="(min-width: 1024px)">
  <title>Shopping Cart | Nexus</title>
</head>
<body>
  <header>
    <div class="btn-menu">
      <label for="btn-menu">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
      </label>
      <a class="header--logo" href="./">
        <img src="../assets/icons/logo.png" alt="Logo de Nexus Store"><h1>Carrito</h1>
      </a>
    </div>
    <nav class="header__menu">
      <a href="../home/index.php" class="menu--home">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
          <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
        </svg><p>Inicio</p>
      </a>
      <a href="../categories/" class="menu--gallery">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
          <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"></path>
        </svg><p>Galería</p>
      </a>
      <a href="../profile/" class="menu--profile">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg><p>Perfil</p>
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
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
          <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
        </svg>
      </label>
    </aside>
  </div>
  <main>
    <h2>
      <svg fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"></path>
      </svg>Enviar a <?php echo $Nombre;?>
    </h2>
    <section class="cart__products">
      
      <?php

          $IDP = "";
          $cont = mysqli_query($conexion, "SELECT * FROM carrito WHERE usuario_id = '$ID'");
          $total = isset($total) ? $total : 0;
          while ($row = $cont->fetch_assoc()) {
              $IDP = $row['producto_id'];
              $id = $row['id'];
              $con = mysqli_query($conexion, "SELECT * FROM producto WHERE id = '$IDP'");
              while ($row = $con->fetch_assoc()) {
                  $nombre = $row['nombre'];
                  $descripcion = $row['descripcion'];
                  $precio = $row['precio'];
                  $img = $row['img'];
                  $total = $precio + $total;
      ?>

          <article class="product">
            <section class="product__data-container">
              <figure class="product__img-container">
                <img src="<?php echo $img?>" alt="">
              </figure>
              <section class="product__info-container">
                <h3 class="product--title"><?php echo $nombre?></h3>
                <p class="product--price">$ <?php echo $precio?></p>
                <p class="product--shipment">
                  <svg fill="currentColor" viewBox="0 0 16 16">
                    <path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z"></path>
                  </svg>- FULL
                </p>
                <div class="product__amount-container">
                  <svg fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"></path>
                  </svg>
                  <p class="product--items"></p>
                  <svg fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                  </svg>
                </div>
              </section>
            </section>
            <div class="product__options-container">
              <a href="../private/eliminar.php?upd=<?php echo $id?>">
                <svg fill="currentColor" class="bi bi-cart-x-fill" viewBox="0 0 16 16">
                  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7.354 5.646 8.5 6.793l1.146-1.147a.5.5 0 0 1 .708.708L9.207 7.5l1.147 1.146a.5.5 0 0 1-.708.708L8.5 8.207 7.354 9.354a.5.5 0 1 1-.708-.708L7.793 7.5 6.646 6.354a.5.5 0 1 1 .708-.708z"></path>
                </svg>Eliminar
              </a>
              <a href="../error/">
                <svg fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"></path>
                </svg>Comprar ahora
              </a>
            </div>
          </article>
      <?php
              }
              
          } 
      ?>
    </section>

    <aside class="products__buy-container">
      <div class="delivery__info-container">
        <p class="delivery--data">Enviar a <?php echo $Nombre;?></p>
        <p class="delivery--cost">Gratis</p>
      </div>
      <div class="product__result">
        <h5 class="result--title">Total con envío</h5>
        <p class="result--total">$ <?php echo $total;?></p>
      </div>
      <a href="#" class="continue__shipping">
        <svg fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
        </svg>- Continuar compra
      </a>
    </aside>
  </main>
</body>
</html>