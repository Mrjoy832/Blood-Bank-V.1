<?php
 session_start();

?>


<script>alert("Hey.. First Register Yourself")</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='Register.css'>
    <link rel="icon" href='./Images/bb_logo(black).png' type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <!-- Add this line to set the zoom size to 80% -->
      <style>body {zoom: 80%;}</style>
</head>
<title>Start Saving Lives </title>
<body>
<header>
    <nav>
    <div class="header-logo"><img src="./Images/Logo.png"></div>
    <div class="header-list">
        <ul>
            <li><a href="help.html">Get Help</li></a>
            <li><a href="donate.html">Donate</li></a>
            <li><a href="index.php#vol-sect">Volunteer</li></a>
            <li><a href="index.php#about-us">About Us</a></li>
            </ul>
    </div>
    </nav>
</header>

<div class="inner">
    <div class="photo">
        <img src="./Images/regphoto.png">
    </div>
    <div class="user-form">
        <h1>Start Saving Lives</h1>
        <form action="" method="POST">
            <i class="fas fa-user icon"></i>
            <input type="text" placeholder="Name" name="NAME">
            <br>
            <i class="fas fa-envelope-square"></i>
            <input type="email" placeholder="E-mail" name="EMAIL">
            <br>
            <i class="fas fa-phone"></i>
            <input type="number" placeholder="Mobile Number" name="PH" id="password_data">
            <i class="fas fa-home"></i>
            <input type="text" placeholder="Enter Address" name="ADDRESS" id="password_data">
            <i class="fas fa-date"></i>
            <input type="date" placeholder="Enter DOB" name="DOB" id="password_data">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" id="password_data" name="PASSWORD">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" id="password_data" name="PASSWORD1">
            

            <!-- <div class="safety" style="font-family: sans-serif; font-size: 20px;">
                Enter Password
            </div> -->
            <div class="action-btn">
                <button class="btn primary" name="REGISTER">Create Account</button>
                
                <a href="Login.php" class="hero-btn btn" target="">Login</a>
            </div>
        </form>
    </div>
</div>
<script src="./Register.js"></script>
</body>
</html>

<?php

include 'connect.php';






// REGISTER USER---------->
if(isset($_POST['REGISTER'])){
    $name1= $_POST['NAME'];
    // $_SESSION['NAME']=$_POST['NAME'];

    // $_SESSION['PH']=$_POST['PH'];
    $mobile1= $_POST['PH'];
    
    // $_SESSION['EMAIL']=$_POST['EMAIL'];
    $email1= $_POST['EMAIL'];
    $pass1=$_POST['PASSWORD'];
    $pass2=$_POST['PASSWORD1'];

    // $_SESSION['ADDRESS']=$_POST['ADDRESS'];
    $address=$_POST['ADDRESS'];

    // $_SESSION['DOB']=$_POST['DOB'];
    $dob=$_POST['DOB'];


    $pass1_= password_hash($pass1, PASSWORD_BCRYPT);
    $pass2_= password_hash($pass2, PASSWORD_BCRYPT);



$emailQuery= "select * from usertable where Email='$email1'";
$query=mysqli_query($conn,$emailQuery);

$emailCount=mysqli_num_rows($query);

if($emailCount>0){
    ?>
<script>alert("Email already exists..");</script>
    <?php
}
else{
    if($pass1===$pass2){ 
      $insert1= "insert into usertable(Name, Email, Phone, DOB, Address, password, Confirmpassword,Usertype) values('$name1','$email1','$mobile1','$dob','$address','$pass1_','$pass2_','User')";  
$iquery=mysqli_query($conn, $insert1);
 if($iquery){
    header("Location: ./login.php");
 }

    }
    else{
        ?>
<script>alert("Password not matched..")</script>
        <?php
    }
   
}
/*
1. check if the mail pre existed
2. is pass and repeat pass same then connection success 
3. else pasword not matched

*/
//------------------------------------------->
}
?>



