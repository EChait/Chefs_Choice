<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <?php include "header.php"; ?>
</head>
<!DOCTYPE html>
<body>
<?php
      
    $nameErr = $emailErr = $numberErr = $streetErr = $cityErr = "";
    $name = $email = $phoneNumber = $street = $city = "";
    $data_missing = array();
    
    if(isset($_POST['submit_button'])){
    if (empty($_POST["customerName"])) {
      $nameErr = "Name is required";
      $data_missing[] = 'Name';
    }
    else {
      $customerName = trim($_POST["customerName"]);
      $_SESSION['customerName'] = $_POST['customerName'];
    }

    if (empty($_POST["Email"])) {
      $emailErr = "Email is required";
      $data_missing[] = 'Email';

    }
    else {
      $email = trim($_POST["Email"]);
      $_SESSION['Email'] = $_POST['Email'];

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $data_missing[] = 'Email';

      }
    }
    if (empty($_POST["PhoneNumber"])) {
      $numberErr = "Phone Number is required";
      $data_missing[] = 'Phone Number';

    }
    else {
      $phoneNumber = trim($_POST["PhoneNumber"]);
      $_SESSION['PhoneNumber'] = $_POST['PhoneNumber'];
      
      if(strlen($_POST["PhoneNumber"]) !== 10){
          $numberErr = "Invalid Phone Number format";
          $data_missing[] = 'Phone Number';
      }
    }
    if (empty($_POST["street"])) {
      $streetErr = "Street is required";
      $data_missing[] = 'Street';

    }
    else {
      $street = trim($_POST["street"]);
      $_SESSION['street'] = $_POST['street'];
    }
    if (empty($_POST["city"])) {
      $cityErr = "City is required";  
      $data_missing[] = 'City';

    }
    else {
      $city = trim($_POST["city"]);
      $_SESSION['city'] = $_POST['city'];
    }
    
    $_SESSION['State'] = $_POST['State'];
    $_SESSION['Category'] = $_POST['Category'];
    $_SESSION['selected_food'] = $_POST['Item'];
    
    if (empty($data_missing)) {
    $url = "placeOrder.php?customerName=" . urlencode($_POST["customerName"]) . "&Email=" . urlencode($_POST["Email"]) . "&PhoneNumber=" . urlencode($_POST["PhoneNumber"]) . "&street=" . urlencode($_POST["street"]) . "&city=" . urlencode($_POST["city"]) . "&State=" . urlencode($_POST["State"]) . "&Category=" . urlencode($_POST["Category"]) . "&Item=" . urlencode($_POST["Item"]);
    header("Location: " . $url);
      header("Location: $url");
      exit();
    } 
}

?>
<a href="register.php">Click HERE to Create a User Name!</a>
<br></br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<label for="customerName">User Name:</label><br>
<input type="text" name="customerName" placeholder="User Name" value="<?php echo isset($_SESSION['customerName']) ? $_SESSION['customerName'] : ''; ?>"/>
<span class="error"><?php echo $nameErr;?></span>
<br><br>
<label for="Email">Email:</label><br>
<input type="text" name="Email"  placeholder="Email" value="<?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : ''; ?>"/>
<span class="error"><?php echo $emailErr;?></span>
<br><br>
<label for="PhoneNumber">Phone Number:</label><br>
<input type="text" name="PhoneNumber" placeholder="Phone Number" value="<?php echo isset($_SESSION['PhoneNumber']) ? $_SESSION['PhoneNumber'] : ''; ?>"/>
<span class="error"><?php echo $numberErr;?></span>
<br><br>
<label for="street">Street:</label><br>
<input type="text" name="street" placeholder="Street" value="<?php echo isset($_SESSION['street']) ? $_SESSION['street'] : ''; ?>"/>
<span class="error"><?php echo $streetErr;?></span>
<br><br>
<label for="city">City:</label><br>
<input type="text" name="city" placeholder="City" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : ''; ?>"/>
<span class="error"><?php echo $cityErr;?></span>
<br><br>
<label for="state">State:</label><br>
<select name="State" >
<option value="NY" <?php echo isset($_SESSION['State']) && $_SESSION['State'] === 'NY' ? 'selected' : ''; ?>>New York
<option value="NJ" <?php echo isset($_SESSION['State']) && $_SESSION['State'] === 'NJ' ? 'selected' : ''; ?>>New Jersey
</select><br><br>
<label for="Category">Menu:</label><br>
<select id="Category" name="Category" value="<?php echo isset($_SESSION['Category']) ? $_SESSION['Category'] : ''; ?>">; // list box select command


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


if($result = $mysqli -> query("SELECT * FROM Menu group by Category order by Category desc")){


while ($row = $result->fetch_assoc()){//Array or records stored in $row
    $category = $row['Category'];
    if(isset($_POST['Category']) && $_POST['Category'] === $category){ // check if option is selected
      echo "<option value='$category' selected>$category</option>"; // add "selected" attribute
    } elseif($category === 'Starters') { // check for default selected option
      echo "<option value='$category' selected>$category</option>"; // add "selected" attribute
    } else {
      echo "<option value='$category'>$category</option>";
    }
  }
}
else{
    echo "error";
}

?>

</select><br><br>


<label for="Item">Items:</label><br>
<select id="Item" name="Item" value="<?php echo isset($_SESSION['Item']) ? $_SESSION['Item'] : ''; ?>">; // list box select command
<?php
if($_SESSION['Category']){
    $categoryId = $_SESSION['Category'];
}
else{
    $categoryId = "Starters";
}
$stmt = $mysqli->prepare("SELECT * FROM Menu WHERE Category = ?");
$stmt->bind_param("s", $categoryId);
$stmt->execute();
$result = $stmt->get_result();
  // Generate options for the subcategory dropdown
 $options = "";
while ($row = $result->fetch_assoc()) {
  $food_name = $row['FoodName'];
  $price = $row['Price'];
  $value = "$food_name-$price";
  $selected = "";
  if(isset($_SESSION['selected_food']) && $_SESSION['selected_food'] === $value) {
    $selected = "selected"; // add "selected" attribute if the option value matches the session value
  }
  $options .= "<option value='$value' $selected>$food_name - $price</option>";
}
  // Return the options as a response to the AJAX request

  // Close the database connection
echo $options;
    $mysqli -> close();

?>
</select><br><br>

<script>
    var categorySelect = document.getElementById('Category');
    var subCategorySelect = document.getElementById('Item');

    // Handle change event on category dropdown
    categorySelect.onchange = function() {
        var categoryId = this.value;
        console.log(categoryId);

        // Send AJAX request to get subcategories for the selected category
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update subcategory dropdown with new options
                subCategorySelect.innerHTML = xhr.responseText;
                console.log(xhr.responseText);
            }
        };
        xhr.open("GET", "list.php?categoryId=" + categoryId, true);
        xhr.send();
    };
</script>

<input type="submit" name="submit_button" value="Place Order" />


</form>



<footer>
<?php include "footer.php"; ?>
</footer>
</html>
