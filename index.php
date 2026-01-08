<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Mugueta Brothers</title>
  <link rel="icon" type="image/x-icon" href="/images/muguetabrothers.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/indice.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik+Mono+One">
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark menosmargin">
    <div class="container-fluid menosmargin">
      <a class="navbar-brand menosmargin" href="#"><img src="images/muguetabrothers.png" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="html/register.php">Crear Cuenta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/domain.php">Crear Dominio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/domainlist.php">Dominios</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <h1>Bienvenido a Mugueta Brothers</h1>
<!-- Aquí tendremos una barra negra debajo de nuestra barra de búsqueda, simplemente es para que quede mejor esteticamente -->
<div class="container-fluid">
  <div class="row">
     <!-- Carousel -->
     <div id="demo" class="carousel slide col-sm-12 col-md-10" data-bs-ride="carousel">
       <!-- col 10 para que luego salgan las página relacionadas
       y el col-sm-12 hace que en el movil ocupe todo y lo de relacionadas
       se baja hacia abajo -->
        <!-- Indicadores/Flechas -->
        <div class="carousel-indicators">
           <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
           <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
           <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        <!-- El carousel -->
        <div class="carousel-inner">
           <div class="carousel-item active">
              <img src="images/gokudrip.jpg" alt="Goku" class="d-block w-100 pequenyo">
           </div>
           <div class="carousel-item">
              <img src="images/muguetabrothers.png" alt="Mugueta" class="d-block w-100 pequenyo">
           </div>
           <div class="carousel-item">
              <img src="images/kirbydrip.jpg" alt="Kirby" class="d-block w-100 pequenyo">
           </div>
        </div>
        <!-- Los iconos de las flechas -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        </button>
     </div>
    <div class="col-md-2 col-sm-12">
        <!-- El col-md 2 es para imagenes medianas de ahí el medium (md) y col-sm-5 es para imagenes pequeñas o small (sm) -->
        <div class="">
          <a class="btn btn-primary btn-lg btn-block" href="html/register.php">Crear Cuenta</a>
        </div>
        <div class="clanbajo centrado">
          <a class="btn btn-primary btn-lg btn-block" href="html/domainlist.php">Listar Dominios</a>
        </div>
        <div class="disneybajo">
          <a class="btn btn-primary btn-lg btn-block" href="html/domain.php">Crear Dominio</a>
        </div>
     </div>
  </div>
</div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
