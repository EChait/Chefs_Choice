<!DOCTYPE html>
<!--
Elisheva Emmer
-->

<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <?php include "header.php"; ?>
</head>
<body>
<form action="responsePage.php" method="post">
        <label for="userName">User Name:</label><br>
        <input type="text" name="userName" placeholder="User Name:"/><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password"  placeholder="Password"/><br><br>
        <a href="register.php">Create an account</a>
            <input type="submit" name="login_button" value="Login" />
            
        </form>


<footer>
<?php include "footer.php"; ?>
</footer>
</html>
