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
            <h2 class="container text-center Grande my-5">Registrate</h2>

            <?php
            $valid = true;
            $connection = mysqli_connect("localhost", "php", "alumnat", "autohosting_db");
            if (!$connection) {
              echo "Error: Unable to connect to MySQL." . PHP_EOL;
              echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
              header('location:erestonto.php');
            exit;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

              $query = "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($connection, $_POST["uname"]) . "'";
              $result = mysqli_query($connection, $query);
              if (mysqli_num_rows($result) > 0) {
                $valid = false;
                $user_invalid = true;
              }

              if (!ctype_alnum($_POST["user"])) {
                $valid = false;
                $user_notalphanumeric = true;
              }

              if ($_POST["pass"] != $_POST["pass2"]) {
                $valid = false;
                $pass_invalid = true;
              }

              if (!ctype_alnum($_POST["pass"])) {
                $valid = false;
                $pass_notalphanumeric = true;
              }

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
                echo "<p>Tu usuario se ha creado correctamente. ¡Ve a la página Crear Dominio para crear tu nuevo sitio!</p>";
                $user_query = "INSERT INTO users (username, password) VALUES ('" . mysqli_real_escape_string($connection, $_POST["uname"]) . "', '" . mysqli_real_escape_string($connection, $_POST["pass"]) . "')";
                $user_result = mysqli_query($connection, $user_query);
                exit();
              }        
            }
            ?>

         </div>
        </div>
      </div>
      <form action="" class="was-validated" method="post">
  <div class="row justify-content-center align-items-center align-items-center align-items-center">
    <div class="col-md-4 col-sm-4 justify-content-center align-items-center align-items-center align-items-center">
      <div class="mb-3 mt-3 justify-content-center align-items-center align-items-center align-items-center">
        <label style="font-family: Rubik Mono One;" for="uname" class="form-label">Usuario:</label>
        <input type="text" class="form-control" id="uname" placeholder="Introduce un usuario" name="uname" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, rellena este apartado.</div>
      
        <?php
        if ($user_invalid) {
          echo "<div class='invalid-feedback'>El usuario ya existe</div>";
        }

        if ($user_notalphanumeric) {
          echo "<div class='invalid-feedback'>El nombre de usuario tiene un formato inválido</div>";
        }
        ?>

      </div>
      <div class="mb-3 justify-content-center align-items-center align-items-center align-items-center">
        <label style="font-family: Rubik Mono One;" for="pass" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" id="pass" placeholder="Introduce una contraseña" name="pass" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, rellena este apartado.</div>

        <?php
        if ($pass_notalphanumeric) {
          echo "<div class='invalid-feedback'>La contraseña tiene un formato inválido/div>";
        }
        ?>

      </div>
      <div class="mb-3 justify-content-center align-items-center align-items-center align-items-center">
        <label style="font-family: Rubik Mono One;" for="pass2" class="form-label">Confirmar Contraseña:</label>
        <input type="password" class="form-control" id="pass2" placeholder="Confirma la contraseña" name="pass2" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, rellena este apartado.</div>

        <?php
        if ($pass_invalid) {
          echo "<div class='invalid-feedback'>Las contraseñas no coinciden</div>";
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
      </form>
      <div class="row justify-content-center align-items-center align-items-center align-items-center">
        <div class="col-md-4 justify-content-center align-items-center align-items-center align-items-center">
          <p>¿Ya tienes cuenta? Inicia sesión.</p>
          <button type="submit" class="btn btn-primary" onclick="window.location.href = '../index.html';">Inicia
          sesión</button>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>