<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Mugueta Brothers</title>
  <link rel="icon" type="image/x-icon" href="/images/muguetabrothers.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../CSS/indice.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Rubik Mono One"></head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="mugetabrothers" href="../index.php"><img class="mugetabrothers" src="../images/muguetabrothers.png" alt="Logo"></a>
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
            <a class="nav-link" href="domainlist.html">Dominios</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <h2 class="rubik">Crea tu web</h2>
      </div>
    </div>
    <form action="/action_page.php" class="was-validated">
      <div class="mb-3 mt-3">
        <label style="font-family: Rubik Mono One;" for="uname" class="form-label">Username:</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Porfavor, rellena este apartado.</div>
      </div>        
      <div class="mb-3">
        <label style="font-family: Rubik Mono One;" for="pwd" class="form-label">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Porfavor, rellena este apartado.</div>
      </div>
      <div class="row mb-3 mt-3">
        <div class row>

        </div>
        <div class="row mb-3 mt-3">
      <button type="submit" class="btn btn-primary">Inicia sesión</button> </div>
    </form>       
    <a class="btn btn-secondary" href="html/register.html">Registrate</a>    </div>

  </div>
  <div class="container-fluid center">
    <div class="row center">
      <div class="col-sm-12 col-md-12 center">
        <img class="center" src="../images/muguetabrothers.png" alt="Mugueta">
      </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
