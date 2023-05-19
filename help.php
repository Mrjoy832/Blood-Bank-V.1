<?php

session_start();
//  include 'navbar.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='help.css'>
    <!-- <link rel="stylesheet" href="nav.css"> -->
    <link rel="icon" href='./Images/bb_logo(black).png' type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="help.css">
    <style>
        
  /*  */
  .popup {
			display: none;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 400px;
			padding: 20px;
			background-color: #f1f1f1;
			border: 1px solid #ccc;
			border-radius: 5px;
			z-index: 1;
            background-color: #fff7f7;
  border: 2px solid #a51919;
		}
		.popup-overlay {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			z-index: 1;
		}
		.close {
			position: absolute;
			top: 10px;
			right: 10px;
			color: #aaa;
			font-size: 28px;
			font-weight: bold;
			cursor: pointer;
		}
		.close:hover {
			color: black;
		}
        .popup h2 {
  font-size: 24px;
  font-weight: bold;
  color: #a51919;
}

.popup input[type="radio"] {
  margin-right: 10px;
}

.popup input[type="submit"] {
  margin-top: 20px;
  padding: 10px;
  background-color: #a51919;
  color: #ffffff;
  border: none;
  border-radius: 5px;
}

.popup input[type="submit"]:hover {
  background-color: #ffffff;
  color: #a51919;
  cursor: pointer;
}
/*  sidebar design*/
.profile-sidebar {
  background-color: #f7f7f7;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.user-logo img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 10px;
}

.user-info h2 {
  font-size: 18px;
  margin: 0;
  margin-bottom: 5px;
}

.user-info p {
  font-size: 14px;
  margin: 0;
  margin-bottom: 5px;
  color: #777;
}

.profile-buttons {
  margin-top: 20px;
}

.profile-buttons a {
  display: block;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  color: #fff;
  text-align: center;
}

.donate-history-btn {
  background-color: #008080;
}

.request-history-btn {
  background-color: #4b0082;
}

.logout-btn {
  background-color: #ff4500;
}

#headrl .icon{
  color: red;
}
.icon i {
  font-size: 20px; /* Change the value to adjust the size of the icon */
}
a #profile-icon{
    font-size:10px;
}

.home  #home-button {
    position: absolute;
    top: 30px;
    right: 30px;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }

    </style>
</head>
<title>Connect with us </title>

<body>

     <header>
    <?php 
    
//     include 'connect.php';
// include 'navbar.php';
// $hospital=$_SESSION['HospitalName'];

// // to check which navbar to serve 
// $UserEmail=$_SESSION['UserEmail'];
// $email="select * from userTable where Email='$UserEmail'";
// $qu=mysqli_query($conn,$email);
// $user=mysqli_fetch_assoc($qu);
// $Type=$user['UserType'];

// if($Type=='Admin'){include 'navbar-admin.php';}
// else if($Type=='User'){include 'navbar.php';}
// // to check which navbar to serve
    // include 'newnav.php';
    ?>

        <nav> 
            <div class="header-logo"><img src="./Images/Logo.png" style="width:40%;"></div>
            <div class="header-list">
            <div class="home">
<?php
	
	include 'connect.php';
	// include 'navbar.php';
	// $hospital=$_SESSION['HospitalName'];
	
	// to check which navbar to serve 
	$UserEmail=$_SESSION['UserEmail'];
	$email="select * from userTable where Email='$UserEmail'";
	$qu=mysqli_query($conn,$email);
	$user=mysqli_fetch_assoc($qu);
	$Type=$user['UserType'];
	if($Type=='User'){?>
	<button id="home-button" ><a href="index-user.php" style="text-decoration:none;color: white;"> Home</a></button>
	<?php
	}

	else if($Type=='Admin'){?>
		<button id="home-button" ><a href="index-admin.php" style="text-decoration:none;color: white;"> Home</a></button>
<?php
	}
	
?>
</div>
            </div> 
         </nav> 
    </header> 



    <main>
        <div class="container">
            <div class="contact-box">
                <div class="left"></div>
                <div class="right">
                    <h2>Connect with us </h2>
                    <form action="help-mail.php" method="POST">
                    <input type="text" class="field" placeholder="Your Name" name="NAME">
                    <input type="text" class="field" placeholder="Your Email" name="EMAIL">
                    <input type="text" class="field" placeholder="Enter heading.." name="SUBJECT">
                    <textarea placeholder="Message" class="field" name="BODY"></textarea>
                    <button class="btn" name="REGISTER">Send</button>
                </form>
                </div>
            </div>
        </div>
    </main>



    <footer>
        <div class="siteFooterBar">
            <div class="content1">
                <div class="foot">2021 © All rights reserved.</div>
            </div>
        </div>
        <div class="footer-content">
            <h3>JOIN OUR CAUSE</h3>
            <p>Donating blood or platelets can be intimidating and even scary. Time to put those hesitations and fears aside. Learn from Blood Buddy and platelet donors how simple and easy it is to roll up a sleeve and help save lives.</p>
            <div class="socials">
                <ul class="sci">
                    <li><a href="https://www.facebook.com/givebloodnhs/" target="_blank"><i
                                class="fab fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/indiablooddonation/?hl=en" target="_blank"><i
                                class="fab fa-instagram"></i></a></li>
                    <li><a href="http://nbtc.naco.gov.in/" target="_blank"><i class="fas fa-globe"></i></a></li>
                </ul>
            </div>
        </div>


    </footer>
    

     <!--  -->
  <div class="popup-overlay" id="popup-overlay"></div>
	<div class="popup" id="popup">
		<span class="close" onclick="closePopup()">&times;</span>
		<div class="profile-sidebar">
  <div class="user-logo">
    <img src="./Images/Logo.png" alt="User Logo">
  </div>
  <div class="user-info">
    <h2>Your Name: <?php echo $_SESSION['NameToDisplay'];?></h2>
    <p><b>Your Email:</b> <?php echo $_SESSION['UserEmail'];  ?></p>
    <p><b>Your Phone:</b> <?php echo $_SESSION['UserPhone'];  ?></p>
    <p><b>Your DOB:</b> <?php echo $_SESSION['userDOB'];  ?></p>
    <p><b>Your Address:</b> <?php echo $_SESSION['userAddress'];  ?></p>
  </div>
  <div class="profile-buttons">
    <a href="./personalDonation.php" onclick="closeProfileBar()" class="donate-history-btn">Donate History</a>
    <a href="./personalRequest.php" class="request-history-btn">Request History</a>
    <a href="./logout.php" class="logout-btn">Logout</a>
  </div>
</div>

	</div>
</div>

  <!--  -->

  
  <script>
    function closeProfileBar() {
  window.close();
}

    function showPopup() {
			document.getElementById("popup-overlay").style.display = "block";
			document.getElementById("popup").style.display = "block";
		}

		function closePopup() {
			document.getElementById("popup-overlay").style.display = "none";
			document.getElementById("popup").style.display = "none";
		}
  </script>
</body>

</html>


