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
            Subdomain to delete: <input type="text" name="subdomain"><br>
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
                if (empty($_POST["subdomain"])) {
                    echo "Subdomain is required<br>";
                    $valid = false;
                }
                else {
                    $query = "SELECT * FROM domains WHERE domain = '" . mysqli_real_escape_string($connection, $_POST["subdomain"]) . "'";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result) < 1) {
                        echo "Subdomain doesn't exist<br>";
                        $valid = false;
                    }
                }
                if ($valid) {
                    $domain_query = "DELETE FROM domains WHERE domain = '" . mysqli_real_escape_string($connection, $_POST["subdomain"]) . "'";
                    $domain_result = mysqli_query($connection, $domain_query);
                    echo "Domain query: " . $domain_query . "<br>";
                    echo "Domain result: " . $domain_result . "<br>";
                    $command = "sudo -n python3 /srv/autohosting/deletehosting.py -u " . $_POST["username"] . " -d " . $_POST["subdomain"] . " 2>&1";
                    $output = shell_exec($command);
                    echo "Command: " . $command . "<br>";
                    echo "Output: " . $output . "<br>";
                }
            }
            ?>
        </form>
    </body>
</html>