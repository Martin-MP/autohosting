<!DOCTYPE html>
<html lang="es" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Mugueta Brothers</title>
      <link rel="icon" type="image/x-icon" href="/images/muguetabrothers.ico">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../CSS/indice.css">
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
                echo "<table class='table table-hover justify-content-center align-items-center'><tbody>";
                while($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td><p style='font-family: Rubik Mono One;'>" . $row["domain"] . "</p></td>";
                  echo "<form method='post' action=''>";
                  echo "<td><button type='submit' name='delete_hosting' class='btn btn-danger' value='" . $row["domain"] . "'>Eliminar</button></td></tr>";
                  echo "</form>";
                }
                echo "</tbody></table>";
              }
              else {
                echo "<p>No parece que tengas ningún sitio web. Crea uno.</p>";
              }
              echo "<form method='post' action=''>";
              echo "<button type='submit' class='btn btn-danger' name='delete_user' value='" . $_POST["uname"] . "'>Eliminar mi usuario</button>";
              echo "</form>";
              exit();
            }

            if ($_POST['delete_hosting']) {
              sleep(3);
              $domain_query = "DELETE FROM domains WHERE domain = '" . mysqli_real_escape_string($connection, $_POST["delete_hosting"]) . "'";
              $domain_result = mysqli_query($connection, $domain_query);
              $user_query = "SELECT user FROM domains WHERE domain = '" . mysqli_real_escape_string($connection, $_POST["delete_hosting"]) . "'";
              $user_result = mysqli_query($connection, $user_query);
              $command = "sudo -n python3 /srv/autohosting/deletehosting.py -u " . $user_result . " -d " . $_POST["delete_hosting"] . " 2>&1";
              exec($command, $output, $retval);
              if ($retval == 0) {
                echo "<p>Ha habido un error al eliminar el dominio.</p>";
              }
              else {
                echo "<p>Dominio eliminado correctamente.</p>";
              }
              echo $output;
              echo $retval;
              exit();
            }

            if ($_POST['delete_user']) {
              sleep(3);
              $user_query = "DELETE FROM users WHERE username = '" . mysqli_real_escape_string($connection, $_POST["delete_user"]) . "'";
              $user_result = mysqli_query($connection, $user_query);
              $command = "sudo -n python3 /srv/autohosting/deleteuser.py -u " . $_POST["delete_user"] . " 2>&1";
              exec($command, $output, $retval);
              if ($retval == 0) {
                echo "<p>Ha habido un error al eliminar el usuario.</p>";
              }
              else {
                echo "<p>Usuario eliminado correctamente.</p>";
              }
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