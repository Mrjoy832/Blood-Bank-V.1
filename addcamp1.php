

<script>alert('Update Your Camp Details\nAnd Submit Again..')</script>


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
                    <!-- <li><a href="index.php#about-us">About Us</a></li> -->
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="box">
            <h2>Connect with us & save lives
                around your location</h2>
                <?php

            include 'connect.php';
            
            $id = $_GET['id'];
        $show="select * from camptable where ID='$id'";
        $query2=mysqli_query($conn,$show);

        $arr=mysqli_fetch_array($query2);

            if(isset($_POST['SUBMIT'])){
                $idUpdate=$_GET['id'];

            $Hospital= $_POST['HOSPITAL'];
            $Address= $_POST['ADDRESS'];
            $Date= $_POST['DATE'];
            $Time= $_POST['TIME'];
            $Ph= $_POST['PH'];
            $Details= $_POST['DETAILS'];


            //to insert into db
            // $insert="insert into camptable(HospitalName,Address,Date,Time,Phone, Comments) values ('$Hospital', '$Address', '$Date', '$Time','$Ph','$Details')";

            //update DB
            $update="update camptable set ID=$id, HospitalName='$Hospital', Address='$Address', Date='$Date', Time='$Time', Phone='$Ph', Comments='$Details' where 
            ID=$idUpdate";
            $query=mysqli_query($conn,$update);//connection come from connection.php's 16th line

            if($query){
            
                header("Location: ./camptable1.php");
                
            }
            }


            ?>
            <ul class="des">
                           
                <form action="" method="POST">
                            
                <li class="steps"><input type="text" placeholder="Enter Hospital Name" name="HOSPITAL" value="<?php echo $arr['HospitalName'];?>"></li>
                <li class="steps"><input type="text" placeholder="Address" name="ADDRESS" value="<?php echo $arr['Address'];?>"></li>
                <li class="steps"><input type="date" placeholder="Enter date " name="DATE" value="<?php echo $arr['Date'];?>"></li>
                <li class="steps"><input type="time" placeholder="Enter Time" name="TIME" value="<?php echo $arr['Time'];?>"></li>
                <li class="steps"><input type="number" placeholder="Enter Contact Number" name="PH" value="<?php echo $arr['Phone'];?>"></li>
                <li class="steps"><input type="text" placeholder="More Details" name="DETAILS" value="<?php echo $arr['Comments'];?>"></li>
                <!-- <li class="steps"><span>5</span> Forever Free 💲❌ </li>
                <li class="steps"><span>6</span> Save a Life 🩸🧬</li> -->
                <!-- <a href="Login.html" class="hero-btn btn" target="_blank">Login</a> -->
                <div class="text-box">
                    <button class="hero-btn" name="SUBMIT">UPDATE EVENT</button>
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

