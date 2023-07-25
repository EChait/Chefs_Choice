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
// Check if the categoryId parameter is set


  // Get the categoryId parameter
  $categoryId = $_GET['categoryId'];
  echo $categoryId;

$stmt = $mysqli->prepare("SELECT * FROM Menu WHERE Category = ?");
$stmt->bind_param("s", $categoryId);
$stmt->execute();
$result = $stmt->get_result();
  // Generate options for the subcategory dropdown
  $options = "";
  
  while ($row = $result->fetch_assoc()){//Array or records stored in $row
   $options.= "<option value='".$row['FoodName']."-".$row['Price']."'>".$row['FoodName']." - ".$row['Price']."</option>";
   error_log("myArray contents: " . print_r($row['FoodName'], true));
  }

  // Return the options as a response to the AJAX request

  // Close the database connection
echo $options;
    $mysqli -> close();


?>

