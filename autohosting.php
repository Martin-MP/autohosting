<html>
    <body>
        <form action="" method="post">
            Nombre de usuario: <input type="text" name="uname"><br>
            Contraseña: <input type="text" name="pass"><br>
            Confirmar contraseña: <input type="text" name="pass2"><br>
            Subdominio: <input type="text" name="subd"><br>
            <input type="submit">
            <br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {            
                $valid = true;
                if ($_POST["pass"] != $_POST["pass2"]) {
                    echo "Las contraseñas no coinciden<br>";
                    $valid = false;
                }
                if (empty($_POST["uname"])) {
                    echo "El campo 'Nombre de usuario' es obligatorio<br>";
                    $valid = false;
                }
                if (empty($_POST["pass"])) {
                    echo "El campo 'Contraseña' es obligatorio<br>";
                    $valid = false;
                }
                if (empty($_POST["pass2"])) {
                    echo "El campo 'Contraseña' es obligatorio<br>";
                    $valid = false;
                }
                if (empty($_POST["subd"])) {
                    echo "El campo 'Contraseña' es obligatorio<br>";
                    $valid = false;
                }
                if ($valid) {
                    header('location:post.php');
                }
            }
            ?>
        </form>
    </body>
</html>