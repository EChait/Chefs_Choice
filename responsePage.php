<head>
    <link rel="stylesheet" href="styles.css">
    <?php include "header.php"; ?>
</head>
<body>
<?php

$host = 'localhost';
$user = 'root';
$passwd = '';
$schema = 'mySchema';
$mysqli = mysqli_connect($host,$user,$passwd,"finalProjectDatabase");
if (!$mysqli)
{
   echo 'Connection failed<br>';
   echo 'Error number: ' . mysqli_connect_errno() . '<br>';
   echo 'Error message: ' . mysqli_connect_error() . '<br>';
   die();
}

$username = $_POST['userName'];
$password = $_POST['password'];
$result = $mysqli -> query("SELECT * FROM `authorizedusers` WHERE `username` = '".$username."' and `password` = '".$password."'");
$type;

if (mysqli_num_rows($result)==1)
 {
while($row = mysqli_fetch_assoc($result))
{
    $username = $row['Username'];//$fieldinfo->username;
    $type = $row['Type']; //type of user
}
session_start();

    $_SESSION['LoggedIn'] = TRUE;
    $_SESSION['username'] = $username;
    
    $result = $mysqli -> query("SELECT * FROM `usertype` WHERE `Type_Id` = '".$type."'");
    if($row = mysqli_fetch_assoc($result)){
           if($row['TypeDescription'] == 'ADMIN') {
                   $_SESSION['Admin'] = true;
           }
           else {    
               $_SESSION['Admin'] = false;
           }
    }
    
    header('Location: content.php');
} else {
    session_start();
     $_SESSION['LoggedIn'] = FALSE;
    echo 'Invalid User Name or Password.';
    echo '<meta http-equiv="refresh" content="2;url=page3.php">';
}
?>

<footer>
<?php include "footer.php"; ?>
</footer>