



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='donate.css'>
    <link rel="icon" href='./Images/bb_logo(black).png' type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<title>Connect with us & save lives around your location </title>

<body>
    <header>
        <nav>
            <div class="header-logo"><img src="./Images/Logo.png" style="width:40%;"></div>
            <div class="header-list">
                <ul>
                    <li><a href="help.php"> Get Help</a></li>
                    <li><a href="donate.html">Donate</a></li>
                    <li><a href="index-admin.php">Home</a></li>
                    <!-- <li><a href="index.php#about-us" >About Us</a></li> -->
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="box">
            <h2>Connect with us & save lives
                around your location</h2>
            <ul class="des">
                <form action="" method="POST">
                <li class="steps"><input type="text" placeholder="Enter Hospital Name" name="HOSPITAL"></li>
                <li class="steps"><input type="text" placeholder="Address" name="ADDRESS"></li>
                <li class="steps"><input type="date" placeholder="Enter date " name="DATE"></li>
                <li class="steps"><input type="time" placeholder="Enter Time" name="TIME"></li>
                <li class="steps"><input type="number" placeholder="Enter Contact Number" name="PH"></li>
                <li class="steps"><input type="text" placeholder="More Details" name="DETAILS"></li>
                <!-- <li class="steps"><span>5</span> Forever Free 💲❌ </li>
                <li class="steps"><span>6</span> Save a Life 🩸🧬</li> -->
                <!-- <a href="Login.html" class="hero-btn btn" target="_blank">Login</a> -->
                <div class="text-box">
                    <button class="hero-btn" name="SUBMIT">ADD EVENT</button>
                    <!-- <button class="hero-btn" ><a href="campTable.php" style="text-decoration:none;"> SHOW CAMPS</a></button> -->
                </div>
                <br>
                <div class="text-box">
                    <!-- <button class="hero-btn" name="SUBMIT">ADD EVENT</button> -->
                    <button class="hero-btn" ><a href="campTable1.php" style="text-decoration:none;"> SHOW CAMPS</a></button>
                </div>
            </form>
            </ul>

            
        </div>


    </main>



    <footer>
        <div class="siteFooterBar">
            <div class="content1">
                <div class="foot">2023 © All rights reserved.</div>
            </div>
        </div>
        <div class="footer-content">
            <h3>JOIN OUR CAUSE</h3>
            <p>Donating blood or platelets can be intimidating and even scary. Time to put those hesitations and fears aside. Learn from Blood Buddy and platelet donors how simple and easy it is to roll up a sleeve and help save lives.</p>
            <div class="socials">
                <ul class="sci">
                    <li><a href="" target="_blank"><i
                                class="fab fa-facebook"></i></a></li>
                    <li><a href="" target="_blank"><i
                                class="fab fa-instagram"></i></a></li>
                    <li><a href="" target="_blank"><i class="fas fa-globe"></i></a></li>
                </ul>
            </div>
        </div>


    </footer>

</body>

<?php

include 'connect.php';

if(isset($_POST['SUBMIT'])){

$Hospital= $_POST['HOSPITAL'];
$Address= $_POST['ADDRESS'];
$Date= $_POST['DATE'];
$Time= $_POST['TIME'];
$Ph= $_POST['PH'];
$Details= $_POST['DETAILS'];


//to insert into db
$insert="insert into camptable(HospitalName,Address,Date,Time,Phone, Comments) values ('$Hospital', '$Address', '$Date', '$Time','$Ph','$Details')";

$query=mysqli_query($conn,$insert);//connection come from connection.php's 16th line

if($query){
    header("Location: ./camptable1.php");
    
}
}


?>