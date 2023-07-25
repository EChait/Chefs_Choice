 <head>
    <link rel="stylesheet" href="styles.css">
    <?php include "header.php"; ?>
</head>
<body>
    <?php
    // Retrieve form data
$customerName = $_POST['customerName'];
$email = $_POST['Email'];
$phoneNumber = $_POST['PhoneNumber'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['State'];
$message = $_POST['myTextArea'];
$addToMailingList = isset($_POST['mailListBox']) ? "Yes" : "No";
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->SMTPDebug=0; //this is very verbose, just for testing, change to 0
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'chefschoicefood525@gmail.com';
$mail->Password = 'atnxknkjyosdwpax';
$mail->setFrom($email);
$mail->addAddress('chefschoicefood525@gmail.com');
$mail->Subject = $customerName;


// Concatenate form data into email body
$mail->Body = "Name: $customerName\n"
            . "Email: $email\n"
            . "Phone Number: $phoneNumber\n"
            . "Street: $street\n"
            . "City: $city\n"
            . "State: $state\n"
            . "Message: $message\n"
            ."Add to Mailing List: $addToMailingList";

//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "<div style='font-size: 24px; text-align: center; background: linear-gradient(to right, burlywood 30%, #b87333); padding: 20px;'>\n"
         . "<p style='font-weight: bold;'>Thank you for contacting Chef's Choice!</p>\n"
         . "<p>Your message has been sent.</p>\n"
         . "<p>We appreciate your feedback and we will get back to you as soon as we can!</p>\n"
         . "</div>\n";
}
?>

<footer>
<?php include "footer.php"; ?>
</footer>
</html>
