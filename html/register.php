<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Mugueta Brothers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../CSS/indice.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Rubik Mono One"></head>
<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="mugetabrothers" href="../index.html"> <img class="mugetabrothers" src="../images/muguetabrothers.png" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="register.html">Crear Cuenta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Crear Dominio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="domainlist.html">Dominios</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
v1
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <h2 class="rubik">Registrate</h2>
      </div>
    </div>
    <form action="" class="was-validated"> #Formulario
        <div class="mb-3 mt-3">
          <label style="font-family: Rubik Mono One;" for="uname" class="form-label">Username:</label>
          <input type="text" class="form-control" id="uname" placeholder="Enter username" name="user" required>
          <div class="valid-feedback">Válido.</div>
          <div class="invalid-feedback">Por favor, rellena este apartado.</div>
        </div>
        <div class="mb-3">
          <label style="font-family: Rubik Mono One;" for="pwd" class="form-label">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
          <div class="valid-feedback">Válido.</div>          <div class="invalid-feedback">Por favor, rellena este apartado.</div>        </div>
        <div class="mb-3">
            <label style="font-family: Rubik Mono One;" for="pass2" class="form-label">Confirm password:</label>
            <input type="password" class="form-control" id="pass2" placeholder="Enter password" name="pass2" required>
            <div class="valid-feedback">Válido.</div>
            <div class="invalid-feedback">Por favor, rellena este apartado.</div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["pass"] != $_POST["pass2"]) {
                    echo "<p class='text-danger'>Las contraseñas no coinciden</p>";
                }
            }
            ?>
            </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
          <label class="form-check-label" for="myCheck">Acepto términos y condiciones.</label>
          <div class="valid-feedback">Válido</div>
          <div class="invalid-feedback">Marca esta opción para avanzar.</div>
        </div>
        <button type="submit" class="btn btn-primary">Aceptar</button>
        <p>¿Ya tienes cuenta? Inicia sesión.</p>
        <button type="submit" class="btn btn-primary">Inicia sesión</button>
      </form>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

