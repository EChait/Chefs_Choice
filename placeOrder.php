 <head>
    <link rel="stylesheet" href="styles.css">
    <?php include "header.php"; ?>
</head>
<body>
    <?php
    // Retrieve form data
$customerName = $_GET['customerName'];
$email = $_GET['Email'];
$phoneNumber = $_GET['PhoneNumber'];
$street = $_GET['street'];
$city = $_GET['city'];
$state = $_GET['State'];
$category = $_GET['Category'];
$item = $_GET['Item'];
$details = explode("-", $item);


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
$sqlquery = "INSERT INTO orders VALUES (NULL, '$customerName', '$email', '$phoneNumber', '$street', '$city', '$state', '$category', '".addslashes($details[0])."', '".addslashes($details[1])."', DEFAULT)";
$result = mysqli_query($mysqli, $sqlquery);
$newId = mysqli_insert_id($mysqli);

// Concatenate form data into email body
    echo "<div style='font-size: 24px; text-align: center; background: linear-gradient(to right, burlywood 30%, #b87333); padding: 20px;'>\n"
         . "<p style='font-weight: bold;'>$customerName, your order has been placed!</p>\n"
         . "<p>Order Number: $newId</p>\n\n"
         . "<p>Name: $customerName</p>\n"
         . "<p>Email: $email</p>\n"
         . "<p>Phone Number: $phoneNumber</p>\n"
         . "<p>Street: $street</p>\n"
         . "<p>City: $city</p>\n"
         . "<p>State: $state</p>\n"
         . "<p>Category:  $category</p>\n"
         ."<p>Order:  $details[0]</p>\n"
         ."<p>Total:  $details[1]</p>\n"
         . "<p>You will receive an email when your order is ready.</p>\n"
         . "</div>\n";

?>
</body>
<footer>
<?php include "footer.php"; ?>
</footer>
</html>
