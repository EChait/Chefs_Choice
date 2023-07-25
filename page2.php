<!DOCTYPE html>
<!--
Elisheva Emmer
-->

<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <?php include "header.php"; ?>
</head>
<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalProjectDatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select menu options with categories and prices
$sql = "SELECT FoodName, Category, Price FROM menu ORDER BY 
        CASE Category
            WHEN 'Starters' THEN 1
            WHEN 'Soup' THEN 2
            WHEN 'Salad' THEN 3
            WHEN 'Sandwiches' THEN 4
            WHEN 'Dessert' THEN 5
            WHEN 'Drink' THEN 6
        END";

$result = $conn->query($sql);

// Display menu options with categories and prices
if ($result->num_rows > 0) {
    $current_category = "";
    while($row = $result->fetch_assoc()) {
        if ($row["Category"] != $current_category) {
            echo "<h2>" . $row["Category"] . "</h2>";
            $current_category = $row["Category"];
        }
        echo $row["FoodName"] . " - $" . $row["Price"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>





<footer>
<?php include "footer.php"; ?>
</footer>
</html>

