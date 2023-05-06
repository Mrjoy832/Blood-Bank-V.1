
<?php

session_start();

?>
<script>alert("Login to access the Portal")</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='Register.css'>
    <link rel="icon" href='./Images/bb_logo(black).png' type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
        <form method="POST">
            <i class="fas fa-envelope-square"></i>
            <input type="email" placeholder="E-mail" name="EMAIL">
            <br>
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" id="password_data" name="PASSWORD">
          

            <!-- <div class="safety" style="font-family: sans-serif; font-size: 20px;">
                Enter Password
            </div> -->
            <div class="action-btn">
                <!-- <button class="btn primary">Create Account</button> -->
                <button class="btn" name="SUBMIT">Login</button>
            </div>
        </form>
    </div>
</div>
<script src="./Register.js"></script>
</body>
</html>

<?php
include 'connect.php';

 if(isset($_POST['SUBMIT'])){
    $email1= $_POST['EMAIL'];
    $pass1= $_POST['PASSWORD'];

    //check if the entered email is in db or not
    $email_seacrh="select * from usertable where Email= '$email1'";
    $query=mysqli_query($conn, $email_seacrh);

    $email_count=mysqli_num_rows($query);
    if($email_count>0){
        //now if email found in db then fetch password and if the pass is of that email
        $pass2=mysqli_fetch_assoc($query);
        $dbPass= $pass2['Password'];

        $passDecode= password_verify($pass1,$dbPass);//(entered pass during login , fetched password)

        // fetching username to display dynamic content in HomePage  
        $_SESSION['NameToDisplay']= $pass2['Name'];

        if($passDecode){
           
          header("Location: ./index.php");
        }
        else{
            ?>
    <script>alert("incorrect password:)");</script>
            <?php
        }
    }
    //when email not found
    else {
        ?>
<script>alert("incorrect Email:)");</script>
        <?php
        
        
    echo "Invalid email<br>";
    }

 }
?>