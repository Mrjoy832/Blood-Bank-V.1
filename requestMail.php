<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPmailer/src/Exception.php';
require './PHPmailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// function for both storing mail and send data
function sendMail($name,$email,$phone,$address,$dob,$hospital,$blood_group,$amount)
{
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host= 'smtp.gmail.com';
    $mail->SMTPAuth =true;
    $mail->Username='bloodbank832@gmail.com';
    $mail->Password='kepaqnvkpdhgdokk';
    $mail->Port= 465;
    $mail->SMTPSecure='ssl';
    $mail->isHTML(true);
    $mail->setFrom($email,$name);
    $mail->addAddress('bloodbank832@gmail.com');
    $mail->Subject=("Urgent Blood request in ($hospital) from $name");
    $mail->Body= ("Name:$name <br> Grp:$blood_group <br> Amount:$amount Unit <br> Email:$email <br> Phone:$phone <br> Address:$address");
    $mail->send();
}

?>





