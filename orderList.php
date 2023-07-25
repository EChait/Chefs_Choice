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


if($result = $mysqli -> query("SELECT * FROM orders")){
    
    echo '<h2>Orders</h2>';

    echo '<table align="left" cellspacing= "15" cellpadding= "15">
    
        <tr><td align="left"><b>Order Number:</b></td>
        <td align="left"><b>Customer Name:</b></td>
        <td align="left"><b>Customer Email:</b></td>
        <td align="left"><b>Phone Number:</b></td>
        <td align="left"><b>Street:</b></td>
        <td align="left"><b>City:</b></td>
        <td align="left"><b>State:</b></td>
        <td align="left"><b>Order Category:</b></td>
        <td align="left"><b>Order Item:</b></td>
        <td align="left"><b>Order Total:</b></td>
        <td align="left"><b>Date:</b></td></tr>';

           
   while($row = mysqli_fetch_array($result)){
        if ($row) {
            echo '<tr><td align="left">'
            .$row['Order_Id'].'</td>'
            .'<td align="left">'
            .$row['Cust_Name'].'</td>'
            .'<td align="left">'
            .$row['Cust_Email'].'</td>'
            .'<td align="left">'
            .$row['Cust_Number'].'</td>'
            .'<td align="left">'
            .$row['Cust_Street'].'</td>'
            .'<td align="left">'
            .$row['Cust_City'].'</td>'
            .'<td align="left">'
            .$row['Cust_State'].'</td>'
            .'<td align="left">'
            .$row['Order_Category'].'</td>'
            .'<td align="left">'
            .$row['Order_Item'].'</td>'
            .'<td align="left">'
            .$row['Order_Price'].'</td>'
            .'<td align="left">'
            .$row['Date'].'</td>';
        }
    }
}
    echo "</table>";

?>
<footer>
<?php include "footer.php"; ?>
</footer>
</html>