<?php
$valid = true;
$connection = mysqli_connect("localhost", "php", "alumnat", "autohosting_db");
if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    header('location:erestonto.php');
    exit;
}
?>
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
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
         <div class="container-fluid">
            <a class="mugetabrothers" href="../index.php"> <img class="mugetabrothers" src="../images/muguetabrothers.png"
               alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="#">Crear Cuenta</a>
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
      <div class="container-fluid col-sm-4 col-md-4">
        <div class="row">
         <div>
            <h2 class="container text-center Grande my-5">Registrate</h2>
         </div>
        </div>
      </div>
      <form action="" class="was-validated" method="post">
  <div class="row justify-content-center align-items-center align-items-center align-items-center">
    <div class="col-md-4 col-sm-4 justify-content-center align-items-center align-items-center align-items-center">
      <div class="mb-3 mt-3 justify-content-center align-items-center align-items-center align-items-center">
        <label style="font-family: Rubik Mono One;" for="uname" class="form-label">Username:</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, rellena este apartado.</div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $query = "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($connection, $_POST["uname"]) . "'";
          $result = mysqli_query($connection, $query);
          if (mysqli_num_rows($result) > 0) {
            echo "<div class='invalid-feedback'>El usuario ya existe</div>";
            $valid = false;
          }
        }
        ?>
      </div>
      <div class="mb-3 justify-content-center align-items-center align-items-center align-items-center">
        <label style="font-family: Rubik Mono One;" for="pass" class="form-label">Password:</label>
        <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass" required>
        <div class="valid-feedback">Válido.</div>
      </div>
      <div class="mb-3 justify-content-center align-items-center align-items-center align-items-center">
        <label style="font-family: Rubik Mono One;" for="pass2" class="form-label">Confirm password:</label>
        <input type="password" class="form-control" id="pass2" placeholder="Enter password" name="pass2" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, rellena este apartado.</div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if ($_POST["pass"] != $_POST["pass2"]) {
            echo "<div class='invalid-feedback'>Las contraseñas no coinciden</div>";
            $valid = false;
          }
        }
        ?>

      </div>
      <div class="form-check mb-3 justify-content-center align-items-center align-items-center align-items-center">
        <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
        <label class="form-check-label" for="myCheck">Acepto términos y condiciones.</label>
        <div class="valid-feedback">Válido</div>
        <div class="invalid-feedback">Marca esta opción para avanzar.</div>
      </div class="justify-content-center align-items-center align-items-center align-items-center">
      <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
  </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["uname"])) {
              $valid = false;
          }
          if (empty($_POST["pass"])) {
              $valid = false;
          }
          if (empty($_POST["pass2"])) {
              $valid = false;
          }
          if ($valid) {
            $user_query = "INSERT INTO users (username, password) VALUES ('" . mysqli_real_escape_string($connection, $_POST["uname"]) . "', '" . mysqli_real_escape_string($connection, $_POST["pass"]) . "')";
            $user_result = mysqli_query($connection, $user_query);
          }
        }
        ?>
      </form>
      <div class="row justify-content-center align-items-center align-items-center align-items-center">
        <div class="col-md-4 justify-content-center align-items-center align-items-center align-items-center">
          <p>¿Ya tienes cuenta? Inicia sesión.</p>
          <button type="submit" class="btn btn-primary" onclick="window.location.href = '../index.html';">Inicia
          sesión</button>
        </div>
      </div>

      <button type="submit" class="btn btn-primary" onclick="window.location.href = '../index.html';">Inicia
          sesión</button>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>