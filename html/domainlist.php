<!DOCTYPE html>
<html lang="es" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Mugueta Brothers</title>
      <link rel="icon" type="image/x-icon" href="/images/muguetabrothers.ico">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../CSS/indice.css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik Mono One">
      <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
   </head>
   <body>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark menosmargin">
    <div class="container-fluid menosmargin">
      <a class="navbar-brand menosmargin" href="../index.php"><img src="../images/muguetabrothers.png" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="register.php">Crear Cuenta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="domain.php">Crear Dominio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="domainlist.php">Dominios</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
      <div class="container-fluid col-sm-4 col-md-4">
        <div class="row">
         <div>
            <h2 class="container text-center Grande my-5">Ver Dominios</h2>
            <h3 class="container text-center Grande my-5">Has de Iniciar sesión</h2>
         </div>
        </div>
      </div>
      <form action="" class="was-validated" method="post">
  <div class="row justify-content-center align-items-center align-items-center align-items-center">
    <div class="col-md-4 col-sm-4 justify-content-center align-items-center align-items-center align-items-center">
      <div class="mb-3 mt-3 justify-content-center align-items-center align-items-center align-items-center">
        <label style="font-family: Rubik Mono One;" for="uname" class="form-label">Usuario:</label>
        <input type="text" class="form-control" id="uname" placeholder="Introduce Usuario" name="uname" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, rellena este apartado.</div>
      
        <?php
        if (mysqli_num_rows($result) > 0) {
          echo "<div class='invalid-feedback'>El usuario ya existe</div>";
        }
        ?>

      </div>
      <div class="mb-3 justify-content-center align-items-center align-items-center align-items-center">
        <label style="font-family: Rubik Mono One;" for="pass" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" id="pass" placeholder="Introduce Contraseña" name="pass" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, rellena este apartado.</div>
      </div>
      </div>
      </div class="justify-content-center align-items-center align-items-center align-items-center">
      <button type="submit" class="btn btn-primary">¡Muestra!</button>
    </div>
  </div>
      </form>
      <div class="row justify-content-center align-items-center align-items-center align-items-center">
        <div class="col-md-4 justify-content-center align-items-center align-items-center align-items-center">
          <p>PONER AQUÍ LISTA O LO QUE SEA</p>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>