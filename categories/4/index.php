<?php
    include '../../private/db.php';
    session_start();

    $Nombre = isset($_SESSION['datos']) ? $_SESSION['datos'] : 'NoHayDatos';
    $ID = isset($_SESSION['id']) ? $_SESSION['id'] : 'NoHayDatos';
    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor, inicia tu sesion");
                window.location = "../../login/index.html"
            </script>
        ';
        session_destroy();
        die();
    }else if($_SESSION['rol'] != 2){
        echo '
            <script>
                alert("Este no es tu rol carnal");
                window.location = "../../login/index.html"
            </script>
        ';
        session_destroy();
        die();
    }

    $categoria = "promociones";
    $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : 'NoHayDatos';
    $sql = "SELECT * FROM producto WHERE INSTR (nombre, '$buscar') and categoria = '$categoria'";
    $ejecutar = mysqli_query($conexion, $sql);


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Nunito:wght@200;300;400;600;700;800;900&family=Oswald:wght@200;300;400;500;700&display=swap" rel="stylesheet">
  <link rel="icon" href="../../assets/icons/1x/category-black.png">
  <link rel="stylesheet" href="../../theme/global/cat.css?ts=<?=time()?>">
  <link rel="stylesheet" href="../css/theme/style.css?ts=<?=time()?>">
  <title>Accessories | Categories | Nexus</title>
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
        <img src="../../assets/icons/logo.png" alt="Logo de Nexus Store"><h1>Promociones</h1>
      </a>
    </div>
    <nav class="header__menu">
      <a href="../../home/index.php" class="menu--home">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
          <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
        </svg><p>Inicio</p>
      </a>
      <a href="tel:+523333943613" class="menu--support">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
          <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg><p>Contacto</p>
      </a>
      <a href="../" class="menu--gallery">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
          <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"></path>
        </svg><p>Galería</p>
      </a>
      <a href="../../cart/" class="menu--cart">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
        </svg><p>Carrito</p>
      </a>
      <a href="../../profile/" class="menu--profile">
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
        <a href="../1/">Consolas</a>
        <a href="../2/">Accesorios</a>
        <a href="../3/">Videojuegos</a>
        <a href="./">Promociones</a>
        <a href="../5/">Edición Limitada</a>
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
    <aside class="main__category">
      <img class="category--avatar" src="../asset/offers-cat.jpg" alt="Foto de la categoría accesorios">
      <h2 class="category--title">Promociones</h2>
      <p class="category--description">¿piensas perder la oportunidad de obtener lo que buscas y a un precio increible? </p>
      <a class="category--btn" href="#">Seguir</a>

      <section class="category__statistics">
        <article class="statistics-data">
          <p>~</p>
          <span>Seguidores</span>
        </article>
        <article class="statistics-data">
          <p>10</p>
          <span>Articulos</span>
        </article>
      </section>
    </aside>

    <section class="main__articles">
      <svg class="articles--vector" fill="currentColor" viewBox="0 0 16 16">
        <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"></path>
        <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"></path>
      </svg>
      <section class="articles__finder-container">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
        <form action="#" method="POST">
          <input type="search" placeholder="Buscar productos..." class="" id="" name="buscar">
          <input type="submit" class="boton" value="Buscar">
        </form>
      </section>
     
      <?php
        if($buscar != "NoHayDatos"){
            while ($row = $ejecutar->fetch_assoc()) {
                $id= $row['id'];
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $meses = $precio/12;
                $img = $row['img'];
                $marca = $row['marca'];
            ?>
            <article class="articles__product">
              <figure class="product__img-container">
                <img src="../<?php echo $img?>" alt="">
                <a href="../../private/like.php?upd=<?php echo $id?>" class="product--like"></a>
              </figure>
              <div class="product__data-container">
                <span class="product--brand">
                  <svg fill="currentColor" viewBox="0 0 16 16">
                    <path d="M7.202 15.967a7.987 7.987 0 0 1-3.552-1.26c-.898-.585-1.101-.826-1.101-1.306 0-.965 1.062-2.656 2.879-4.583C6.459 7.723 7.897 6.44 8.052 6.475c.302.068 2.718 2.423 3.622 3.531 1.43 1.753 2.088 3.189 1.754 3.829-.254.486-1.83 1.437-2.987 1.802-.954.301-2.207.429-3.239.33Zm-5.866-3.57C.589 11.253.212 10.127.03 8.497c-.06-.539-.038-.846.137-1.95.218-1.377 1.002-2.97 1.945-3.95.401-.417.437-.427.926-.263.595.2 1.23.638 2.213 1.528l.574.519-.313.385C4.056 6.553 2.52 9.086 1.94 10.653c-.315.852-.442 1.707-.306 2.063.091.24.007.15-.3-.319Zm13.101.195c.074-.36-.019-1.02-.238-1.687-.473-1.443-2.055-4.128-3.508-5.953l-.457-.575.494-.454c.646-.593 1.095-.948 1.58-1.25.381-.237.927-.448 1.161-.448.145 0 .654.528 1.065 1.104a8.372 8.372 0 0 1 1.343 3.102c.153.728.166 2.286.024 3.012a9.495 9.495 0 0 1-.6 1.893c-.179.393-.624 1.156-.82 1.404-.1.128-.1.127-.043-.148ZM7.335 1.952c-.67-.34-1.704-.705-2.276-.803a4.171 4.171 0 0 0-.759-.043c-.471.024-.45 0 .306-.358A7.778 7.778 0 0 1 6.47.128c.8-.169 2.306-.17 3.094-.005.85.18 1.853.552 2.418.9l.168.103-.385-.02c-.766-.038-1.88.27-3.078.853-.361.176-.676.316-.699.312a12.246 12.246 0 0 1-.654-.319Z"></path>
                  </svg> <?php echo '- '.$marca?> 
                </span>
                <a class="product--title" href="../../home/products/producto_descuento.php?upd=<?php echo $id?>"><?php echo $nombre?></a>
                <p class="product--description"><?php echo $descripcion?></p>
                <p class="product--price"><?php echo '$ '.$precio?></p>
                <p class="product--monthly-payment">en <span>12 <span class="lowerCase">x</span> $ <?php echo $meses?> sin intereses</span></p>
                <p class="product--shipment">
                  <svg fill="currentColor" viewBox="0 0 16 16">
                    <path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z"></path>
                  </svg> - FULL
                </p>
              </div>
            </article> 
        <?php
            }
            }else{
            $cont = mysqli_query($conexion, "SELECT * FROM producto WHERE categoria = '$categoria'");

            while ($row = $cont->fetch_assoc()) {
                $id= $row['id'];
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $meses = $precio/12;
                $img = $row['img'];
                $marca = $row['marca'];
        ?>
        <article class="articles__product">
          <figure class="product__img-container">
            <img src="../<?php echo $img?>" alt="">
            <a href="../../private/like.php?upd=<?php echo $id?>" class="product--like"></a>
          </figure>
          <div class="product__data-container">
            <span class="product--brand">
              <svg fill="currentColor" viewBox="0 0 16 16">
                <path d="M7.202 15.967a7.987 7.987 0 0 1-3.552-1.26c-.898-.585-1.101-.826-1.101-1.306 0-.965 1.062-2.656 2.879-4.583C6.459 7.723 7.897 6.44 8.052 6.475c.302.068 2.718 2.423 3.622 3.531 1.43 1.753 2.088 3.189 1.754 3.829-.254.486-1.83 1.437-2.987 1.802-.954.301-2.207.429-3.239.33Zm-5.866-3.57C.589 11.253.212 10.127.03 8.497c-.06-.539-.038-.846.137-1.95.218-1.377 1.002-2.97 1.945-3.95.401-.417.437-.427.926-.263.595.2 1.23.638 2.213 1.528l.574.519-.313.385C4.056 6.553 2.52 9.086 1.94 10.653c-.315.852-.442 1.707-.306 2.063.091.24.007.15-.3-.319Zm13.101.195c.074-.36-.019-1.02-.238-1.687-.473-1.443-2.055-4.128-3.508-5.953l-.457-.575.494-.454c.646-.593 1.095-.948 1.58-1.25.381-.237.927-.448 1.161-.448.145 0 .654.528 1.065 1.104a8.372 8.372 0 0 1 1.343 3.102c.153.728.166 2.286.024 3.012a9.495 9.495 0 0 1-.6 1.893c-.179.393-.624 1.156-.82 1.404-.1.128-.1.127-.043-.148ZM7.335 1.952c-.67-.34-1.704-.705-2.276-.803a4.171 4.171 0 0 0-.759-.043c-.471.024-.45 0 .306-.358A7.778 7.778 0 0 1 6.47.128c.8-.169 2.306-.17 3.094-.005.85.18 1.853.552 2.418.9l.168.103-.385-.02c-.766-.038-1.88.27-3.078.853-.361.176-.676.316-.699.312a12.246 12.246 0 0 1-.654-.319Z"></path>
              </svg> <?php echo '- '.$marca?> 
            </span>
            <a class="product--title" href="../../home/products/producto_descuento.php?upd=<?php echo $id?>"><?php echo $nombre?></a>
            <p class="product--description"><?php echo $descripcion?></p>
            <p class="product--price"><?php echo '$ '.$precio?></p>
            <p class="product--monthly-payment">en <span>12 <span class="lowerCase">x</span> $ <?php echo $meses?> sin intereses</span></p>
            <p class="product--shipment">
              <svg fill="currentColor" viewBox="0 0 16 16">
                <path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z"></path>
              </svg> - FULL
            </p>
          </div>
        </article> 
    <?php
            }
        }
    ?>
    <script src="../../client/js/likes.js"></script>
    </section>
  </main>
</body>
</html>