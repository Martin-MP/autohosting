<?php
$host = "localhost";
$user = "php";
$password = "alumnat";
$database = "autohosting_db";
$connection = mysqli_connect($host, $user, $password, $database);
$processUser = posix_getpwuid(posix_geteuid());
$processUser = $processUser['name'];
echo "Process user: " . $processUser . "<br>";
if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}
?>
<html>
    <body>
        <form action="" method="post">
            Username: <input type="text" name="username"><br>
            Password: <input type="text" name="password"><br>
            <input type="submit">
            <br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valid = true;
                if (empty($_POST["username"])) {
                    echo "Username is required<br>";
                    $valid = false;
                }
                else {
                    $query = "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($connection, $_POST["username"]) . "'";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result) < 1) {
                        echo "Username doesn't exist<br>";
                        $valid = false;
                    }
                }
                if (empty($_POST["password"])) {
                    echo "Password is required<br>";
                    $valid = false;
                }
                else {
                    $query = "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($connection, $_POST["username"]) . "' AND password = '" . mysqli_real_escape_string($connection, $_POST["password"]) . "'";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result) < 1) {
                        echo "Password is incorrect<br>";
                        $valid = false;
                    }
                }
                if ($valid) {
                    $user_query = "DELETE FROM users WHERE username = '" . mysqli_real_escape_string($connection, $_POST["username"]) . "'";
                    $user_result = mysqli_query($connection, $user_query);
                    echo "User query: " . $user_query . "<br>";
                    echo "User result: " . $user_result . "<br>";
                    $command = "sudo -n python3 /srv/autohosting/deleteuser.py -u " . $_POST["username"] . " 2>&1";
                    $output = shell_exec($command);
                    echo "Command: " . $command . "<br>";
                    echo "Output: " . $output . "<br>";
                }
            }
            ?>
        </form>
    </body>
</html>