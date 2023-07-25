<?php
session_start();

if ($_SESSION['LoggedIn']) {    
    if($_SESSION['Admin']){
        header('Location: orderList.php');
    }
    else {
        $username = $_SESSION['username'];
        setcookie('username', $username , time() + 3600, '/');
        header('Location: pastOrders.php');
    }
    
} else {
    echo 'You are not logged in';
    echo '<meta http-equiv="refresh" content="5;url=page4.php">';
}
?>