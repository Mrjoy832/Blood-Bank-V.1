<?php
// session_start();
?>


<html>
<head>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Neuton&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style>
  #logo {
  position: absolute;
  top: 5%;
  left: 6%;
  transform: translate(-50%, -50%);
  text-align: center;
  font-family: "Neuton", serif;
  line-height: 20px;
  margin-bottom: 5px;
  /* margin-left: 50px; */
}

#logo > a > img {
  width: 40%;
}
  
 /* Navbar styles */
 #nav {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    height: 50px;
    background-color: transparent;
    top: 5%
  }

  #headerl {
    display: flex;
    align-items: center;
  }

  #headerl ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  #headerl li {
    margin: 0 10px;
    /* font-family: "Neuton", serif; */
  }

  #headerl a {
    color: black;
    font-size: 22px;
    font-weight: bold;
    text-decoration: none;
    padding: 10px;
    border-radius: 5px;
    font-family: 'Neuton', serif;

  }

  #headerl a:hover {
    background-color: rgba(0, 0, 0, 0.1);
  }

  #headerl i {
  margin-right: 10px;
  font-size: 20px; /* Increase the font size */
  cursor: pointer;
  color: red; /* Add color */
}

  
  /*  */
  .popup1 {
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
		.popup-overlay1 {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			z-index: 1;
		}
		.close1 {
			position: absolute;
			top: 10px;
			right: 10px;
			color: #aaa;
			font-size: 28px;
			font-weight: bold;
			cursor: pointer;
		}
		.close1:hover {
			color: black;
		}
        .popup1 h2 {
  font-size: 24px;
  font-weight: bold;
  color: #a51919;
}

.popup1 input[type="radio"] {
  margin-right: 10px;
}

.popup1 input[type="submit"] {
  margin-top: 20px;
  padding: 10px;
  background-color: #a51919;
  color: #ffffff;
  border: none;
  border-radius: 5px;
}

.popup1 input[type="submit"]:hover {
  background-color: #ffffff;
  color: #a51919;
  cursor: pointer;
}
/*  sidebar design*/
.profile-sidebar1 {
  background-color: #f7f7f7;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.user-logo1 img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 10px;
}

.user-info1 h2 {
  font-size: 18px;
  margin: 0;
  margin-bottom: 5px;
}

.user-info1 p {
  font-size: 14px;
  margin: 0;
  margin-bottom: 5px;
  color: #777;
}

.profile-buttons1 {
  margin-top: 20px;
}

.profile-buttons1 a {
  display: block;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  color: #fff;
  text-align: center;
}

.donate-history-btn1 {
  background-color: #008080;
}

.request-history-btn1 {
  background-color: #4b0082;
}

.logout-btn1 {
  background-color: #ff4500;
}

#headrl .icon{
  color: red;
}
.icon i {
  font-size: 50px; /* Change the value to adjust the size of the icon */
}
</style>
</head>


<body>
  
<div id="logo">
    <a href="index.php"><img src="./Images/Logo.png"></a>
  </div>
  <div id="nav">
    <div class="header-list" id="headerl">
      <!-- <i class="fa fa-times" onclick="hideMenu()"></i> -->
      <ul>
      <li><a href="index-admin.php"><i class="fa fa-home"></i></a></li>
        <li><a class="scroll" href="./index.php#about-us">About Us</a></li>
        <li><a href="./index.php#vol-sect" target="">Admin</a></li>
        <li><a href="donate.html" target="">Donate</a></li>
        <li><a href="donate.html" target="">Request</a></li>
        <li><a href="HospitalList.php" target="">Hospital List</a></li>
        <li><a href="history.php" target="">History</a></li>
        <li><a  href="addCamp.php">Camps</a></li>

        <!-- <li><a target="_blank" href="camptable.php">Camps</a></li> -->
        <li><a href="help.html" target="">Get Help</a></li>
        <!-- <li><a href="#" id="profile-icon" onclick="openSidebar()"><i class="fa-solid fa-user"></i></a></li> -->
        <li class="icon"><a href="#" id="profile-icon" onclick="showPopup()"><i class="fas fa-user-circle" style="font-size:30px;"></i></a></li>
        <li><a href="javascript:history.go(-1)"><i class="fa fa-arrow-left"></i></a></li>
        
      </ul>
    </div>
    <!-- <i class="fa fa-bars" onclick="showMenu()"></i> -->
  </div>

  <!--  -->
  <div class="popup-overlay1" id="popup-overlay1"></div>
	<div class="popup1" id="popup1">
		<span class="close1" onclick="closePopup()">&times;</span>
		<div class="profile-sidebar1">
  <div class="user-logo1">
    <img src="./Images/Logo.png" alt="User Logo">
  </div>
  <div class="user-info1">
    <h2>Your Name: <?php echo $_SESSION['NameToDisplay'];?></h2>
    <p><b>Your Email:</b> <?php echo $_SESSION['UserEmail'];  ?></p>
    <p><b>Your Phone:</b> <?php echo $_SESSION['UserPhone'];  ?></p>
    <p><b>Your DOB:</b> <?php echo $_SESSION['userDOB'];  ?></p>
    <p><b>Your Address:</b> <?php echo $_SESSION['userAddress'];  ?></p>
  </div>
  <div class="profile-buttons1">
    <a href="./personalDonation.php" onclick="closeProfileBar()" class="donate-history-btn1">Donate History</a>
    <a href="./personalRequest.php" class="request-history-btn1">Request History</a>
    <a href="./logout.php" class="logout-btn1">Logout</a>
  </div>
</div>

	</div>


  <!--  -->


  <script>
    function closeProfileBar() {
  window.close();
}

    function showPopup() {
			document.getElementById("popup-overlay1").style.display = "block";
			document.getElementById("popup1").style.display = "block";
		}

		function closePopup() {
			document.getElementById("popup-overlay1").style.display = "none";
			document.getElementById("popup1").style.display = "none";
		}
  </script>
  </body>

  </html>