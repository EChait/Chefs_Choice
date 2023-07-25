<!DOCTYPE html>
<!--
Elisheva Emmer
-->


<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <?php include "header.php"; ?>
</head>
<!DOCTYPE html>
<body>
<form action="submit.php" method="post">
<label for="customerName">Name:</label><br>
<input type="text" name="customerName" placeholder="Name"/><br><br>
<label for="Email">Email:</label><br>
<input type="text" name="Email"  placeholder="Email"/><br><br>
<label for="PhoneNumber">Phone Number:</label><br>
<input type="text" name="PhoneNumber" placeholder="Phone Number" /><br><br>
<label for="street">Street:</label><br>
<input type="text" name="street" placeholder="Street"/><br><br>
<label for="city">Last name:</label><br>
<input type="text" name="city" placeholder="City"/><br><br>
<label for="state">State:</label><br>
<select name="State" >
<option value="NY" SELECTED>New York
<option value="NJ">New Jersey
</select><br><br>
<label for="myTextArea">Please write your message below!</label><br>
<textarea name="myTextArea" rows="10" cols="60" placeholder="Enter Text Here">
</textarea><br><br>
<input type="CHECKBOX" name="mailListBox" checked>Add Me To The Mailing List.<br><br>
<input type="submit" name="submit_button" value="Press to Submit" />
</form>
    



<footer>
<?php include "footer.php"; ?>
</footer>
</html>
