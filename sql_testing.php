// make a filter that checks if the database is accessible
<?php
$host = "localhost";
$user = "php";
$password = "alumnat";
$database = "autohosting_db";
$connection = mysqli_connect($host, $user, $password, $database);
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
            Confirm password: <input type="text" name="password_confirmation"><br>
            Subdomain: <input type="text" name="subdomain"><br>
            <input type="submit">
            <br>
            <?php
            // check if any field is empty and print an error message
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valid = true;
                if ($_POST["password"] != $_POST["password_confirmation"]) {
                    echo "Passwords do not match<br>";
                    $valid = false;
                }
                if (empty($_POST["username"])) {
                    echo "Username is required<br>";
                    $valid = false;
                }
                else {
                    $query = "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($connection, $_POST["username"]) . "'";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "Username already exists<br>";
                        $valid = false;
                    }
                }
                if (empty($_POST["password"])) {
                    echo "Password is required<br>";
                    $valid = false;
                }
                if (empty($_POST["password_confirmation"])) {
                    echo "Password confirmation is required<br>";
                    $valid = false;
                }
                if (empty($_POST["subdomain"])) {
                    echo "Subdomain is required<br>";
                    $valid = false;
                }
                else {
                    $query = "SELECT * FROM domains WHERE name = '" . mysqli_real_escape_string($connection, $_POST["subdomain"]) . "'";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "Subdomain already exists<br>";
                        $valid = false;
                    }
                }
                if ($valid) {
                    $query = "INSERT INTO users (username, password) VALUES ('" . mysqli_real_escape_string($connection, $_POST["username"]) . "', '" . mysqli_real_escape_string($connection, $_POST["password"]) . "')";
                    mysqli_query($connection, $query);
                    $query = "INSERT INTO domains (name, user) VALUES ('" . mysqli_real_escape_string($connection, $_POST["subdomain"]) . "', " . mysqli_insert_id($connection) . ")";
                    mysqli_query($connection, $query);
                    echo "User created successfully<br>";
                }
            }
            ?>
        </form>
    </body>
</html>