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

            <?php
            $valid = true;
            $connection = mysqli_connect("localhost", "php", "alumnat", "autohosting_db");
            if (!$connection) {
              echo "Error: Unable to connect to MySQL." . PHP_EOL;
              echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
              header('location:erestonto.php');
            exit;
            }

            $query = "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($connection, $_POST["uname"]) . "'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) < 1) {
              $valid = false;
              $user_invalid = true;
            }
            else {
              $query = "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($connection, $_POST["uname"]) . "' AND password = '" . mysqli_real_escape_string($connection, $_POST["pass"]) . "'";
              $result = mysqli_query($connection, $query);
              if (mysqli_num_rows($result) < 1) {
                $valid = false;
                $pass_invalid = true;
              } 
            }

            if ($valid) {
              $query = "SELECT domain FROM domains WHERE user = '" . mysqli_real_escape_string($connection, $_POST["uname"]) . "'";
              $result = mysqli_query($connection, $query);
              if (mysqli_num_rows($result) > 0) {
                echo "<table class='table justify-content-center'>";
                echo "<tbody>";
                while($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td><p style='font-family: Rubik Mono One;'>";
                  echo $row["domain"];
                  echo "</p></td>";
                  echo "<td><button type='submit' class='btn btn-danger'>Eliminar</button></td>";
                  echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
              }
              else {
                echo "<p>No parece que tengas ningún sitio web. Crea uno.</p>";
              }
              echo "<button type='submit' class='btn btn-danger'>Eliminar mi usuario</button>";
              exit();
            }      
            ?>

            <h3 class="container text-center Grande2 my-5">Has de Iniciar sesión</h2>
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
          echo "<div class='invalid-feedback'>El usuario no existe</div>";
        }
        if ($pass_invalid) {
          echo "<div class='invalid-feedback'>El usuario o la contraseña no son correctos</div>";
        }
        ?>

      </div>
      <div class="mb-3 justify-content-center align-items-center align-items-center align-items-center">
        <label style="font-family: Rubik Mono One;" for="pass" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" id="pass" placeholder="Introduce una contraseña" name="pass" required>
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, rellena este apartado.</div>

        <?php
        if ($pass_invalid) {
          echo "<div class='invalid-feedback'>El usuario o la contraseña no son correctos</div>";
        }
        ?>

      </div>
      <div class="form-check mb-3 justify-content-center align-items-center align-items-center align-items-center">
      </div class="justify-content-center align-items-center align-items-center align-items-center">
      <button type="submit" class="btn btn-primary">¡Muestra!</button>
    </div>
      </div>
  </div>
      </form>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>