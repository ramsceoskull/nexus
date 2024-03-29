<!-- Design Completed -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Nunito:wght@200;300;400;600;700;800;900&family=Oswald:wght@200;300;400;500;700&display=swap" rel="stylesheet">
  <link rel="icon" href="../assets/icons/1x/home-black.png">
  <link rel="stylesheet" href="../theme/index.css?ts=<?=time()?>">
  <link rel="stylesheet" href="./css/style.css?ts=<?=time()?>">
  <link rel="stylesheet" href="./css/styleL.css?ts=<?=time()?>" media="(min-width: 375px)">
  <link rel="stylesheet" href="./css/tablet.css?ts=<?=time()?>" media="(min-width: 768px)">
  <link rel="stylesheet" href="./css/desktop.css?ts=<?=time()?>" media="(min-width: 1024px)">
  <title>Home | Nexus</title>
</head>
<body>
  <header>
    <div class="btn-menu">
      <a class="header--logo" href="./">
        <img src="../assets/icons/logo.png" alt="Logo de Nexus Store"><h1>Nexus Store</h1>
      </a>
    </div>
    <nav class="header__menu">
      <a href="#support" class="menu--support">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
          <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg><p>Contacto</p>
      </a>
      <a href="../cart/" class="menu--cart">
        <svg fill="currentColor" ill" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
        </svg><p>Carrito</p>
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
  <main>
    <article title="Video de ayuda para usar el sitio" class="main__news">
      <svg class="help" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"></path>
      </svg>
      <a href="./helper/" target="_blank" rel="noopener noreferrer"><h3>¿Cómo usar nuestro sitio?</h3></a>
    </article>
    <article title="Productos añadidos recientemente..." class="main__news novedades">
      <svg class="updates" fill="currentColor" viewBox="0 0 16 16">
        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
      </svg>
      <a href="./archive/"><h3>Novedades</h3></a>
    </article>
    <article title="Lista de categorías" class="main__news another">
      <svg class="categories" fill="currentColor" viewBox="0 0 16 16">
        <path d="M7 2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0zm4.225 4.053a.5.5 0 0 0-.577.093l-3.71 4.71-2.66-2.772a.5.5 0 0 0-.63.062L.002 13v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4.5l-4.777-3.947z"></path>
      </svg>
      <a href="../categories/"><h3>Categorías</h3></a>
    </article>
    <article title="Función en desarrollo..." class="main__news soon">
      <svg class="warning" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"></path>
      </svg>
      <a href="../error/"></a>
    </article>
  </main>

  <footer id="support">
    <section class="footer--up">
      <nav>
        <a href="../error/">
          <img src="../assets/svg/gmail-logo.svg" alt="Gmail de Jackie">Jackie Domínguez
        </a>
        <a href="mailto:ramses.lanceno@alumnos.udg.mx">
          <img src="../assets/svg/gmail-logo.svg" alt="Gmail de Ramsés">Ramsés Anceno
        </a>
        <a href="mailto:ruben.vivian@alumnos.udg.mx">
          <img src="../assets/svg/gmail-logo.svg" alt="Gmail de Emilio">Emilio Vivian
        </a>
        <a href="mailto:froilan.villasenor@alumnos.udg.mx">
          <img src="../assets/svg/gmail-logo.svg" alt="Gmail de Froilan">Froilan Villaseñor
        </a>
        <a href="mailto:cristobal.mtorres@alumnos.udg.mx">
          <img src="../assets/svg/gmail-logo.svg" alt="Gmail de Cristobal">Cristobal Torres
        </a>
        <a href="mailto:ivan.trillo@alumnos.udg.mx">
          <img src="../assets/svg/gmail-logo.svg" alt="Gmail de Trillo">Ivan Trillo
        </a>
      </nav>
      <div class="logo-container">
        <a href="../"><img src="../assets/icons/logo.png" alt="Nexus Store Logo"><p>Nexus 2021 ©</p></a>
      </div>
    </section>
    <nav class="footer--down">
      <a href="#">Términos de uso</a>
      <a href="tel:+523333943613" class="footer__call-service">
        <svg fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
        </svg> - Centro de ayuda
      </a>
      <a href="#">Declaración de privacidad</a>
    </nav>
  </footer>
</body>
</html>
