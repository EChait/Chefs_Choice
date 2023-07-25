<<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->SMTPDebug=4; //this is very verbose, just for testing, change to 0
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'chefschoicefood525@gmail.com';
$mail->Password = 'atnxknkjyosdwpax';
$mail->setFrom('chefschoicefood525@gmail.com');
$mail->addAddress('chefschoicefood525@gmail.com');
$mail->Subject = 'Hello from PHPMailer!';
$mail->Body = 'This is a test.';
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}
?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

