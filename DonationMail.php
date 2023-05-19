<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPmailer/src/Exception.php';
require './PHPmailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// function for both storing mail and send data
function sendMail($email, $patientName, $hospitalName, $blood_group) {
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host= 'smtp.gmail.com';
    $mail->SMTPAuth =true;
    $mail->Username='bloodbank832@gmail.com';
    $mail->Password='kepaqnvkpdhgdokk';
    $mail->Port= 465;
    $mail->SMTPSecure='ssl';
    $mail->isHTML(true);
    $mail->setFrom($email ,$patientName);
    $mail->addAddress('bloodbank832@gmail.com');
    $mail->Subject=("Blood Donation from $patientName in Your hospital -- ($hospitalName) ");
    $mail->Body= ("Name:$patientName <br> Email: $email <br> Blood-Grp:$blood_group ");
    $mail->send();
}

?>





