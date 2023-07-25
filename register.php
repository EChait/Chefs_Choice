<head>
    <link rel="stylesheet" href="styles.css">
    <?php include "header.php"; ?>
</head>

<body>
<h2>Create a new account</h2>
<form action="register.php" method="post">
    <label for="userName">Username:</label>
    <input type="text" name="userName" id="userName" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br><br>
    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" name="confirmPassword" id="confirmPassword" required>
    <br><br>
    <input type="submit" value="Register">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password != $confirmPassword) {
        echo "Passwords do not match!";
        exit();
    }
    
    $host = 'localhost';
$user = 'root';
$passwd = '';
$dbname = 'finalProjectDatabase';

$mysqli = new mysqli($host, $user, $passwd, $dbname);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

    $result = $mysqli->query("SELECT * FROM authorizedusers WHERE username = '".$username."'");
    if ($result->num_rows > 0) {
        echo "Username already taken!";
        exit();
    }

    $result = $mysqli->query("INSERT INTO authorizedusers (username, password, type) VALUES ('".$username."', '".$password."', 2)");
    if ($result) {
        echo "User created successfully!";
        header("refresh:2; url=page3.php");
    } else {
        echo "Error creating user!";
    }
}
?>

<footer>
    <?php include "footer.php"; ?>
</footer>

