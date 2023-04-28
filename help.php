<!-- To send the feedback into my mail -->

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPmailer/src/Exception.php';
require './PHPmailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['REGISTER'])){
    $name1= $_POST['NAME'];
    $email1= $_POST['EMAIL'];
    $sub1= $_POST['SUBJECT'];
    $body1= $_POST['BODY'];

    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host= 'smtp.gmail.com';
    $mail->SMTPAuth =true;
    $mail->Username='tridibbag24@gmail.com';
    $mail->Password='xlyetrhxjhoafylp';
    $mail->Port= 465;
    $mail->SMTPSecure='ssl';
    $mail->isHTML(true);
    $mail->setFrom($email1,$name1);
    $mail->addAddress('tridibbag24@gmail.com');
    $mail->Subject=("$email1 ($sub1)");
    $mail->Body= $body1;
    $mail->send();

    header("Location: ./response.php");
}