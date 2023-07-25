<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
  <?php include "header.php"; ?>
  <style>
    .wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .wrapper > main {
      flex-grow: 1;
    }

    footer {
      height: 50px;
      margin-top: auto;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <main>
     <?php
session_start();

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

$username = $_COOKIE['username'];
    if ($result = $mysqli -> query("SELECT * FROM `orders` WHERE `Cust_Name` = '".$username."'")){
        
    echo '<h2>Past Orders</h2>';

    echo '<div>';
    echo '<table align="left" cellspacing= "15" cellpadding= "25">

            <tr><td align="left"><b>Order Number:</b></td>
            <td align="left"><b>Order Category:</b></td>
            <td align="left"><b>Order Item:</b></td>
            <td align="left"><b>Order Total:</b></td>
            <td align="left"><b>Order Date:</b></td></tr>';

       while($row = mysqli_fetch_array($result)){
            if ($row) {
                echo '<tr><td align="left">'
                .$row['Order_Id'].'</td>'
                .'<td align="left">'
                .$row['Order_Category'].'</td>'
                .'<td align="left">'
                .$row['Order_Item'].'</td>'
                .'<td align="left">'
                .$row['Order_Price'].'</td>'
                .'<td align="left">'
                .$row['Date'].'</td></tr>';
            }
        }
        echo "</table>"; // close the table here
        echo "</div>";
}

else {
    
    echo "<div style='font-size: 24px; text-align: center; background: linear-gradient(to right, burlywood 30%, #b87333); padding: 20px;'>\n"
         . "<p style='font-weight: bold;'>You have no past orders.</p>\n"
         . "</div>\n";
    
}
?>
    </main>
    <footer>
      <?php include "footer.php"; ?>
    </footer>
  </div>
</body>
</html>

