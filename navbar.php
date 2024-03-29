<?php
// session_start();
?>


<html>
<head>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Neuton&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style>
  .navbar-container #logo {
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

.navbar-container #logo > a > img {
  width: 40%;
}
  
 /* Navbar styles */
 .navbar-container #nav {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    height: 50px;
    background-color: transparent;
    top: 5%
  }

  .navbar-container #headerl {
    display: flex;
    align-items: center;
  }

  .navbar-container #headerl ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .navbar-container #headerl li {
    margin: 0 10px;
    /* font-family: "Neuton", serif; */
  }

  .navbar-container #headerl a {
    color: black;
    font-size: 22px;
    font-weight: bold;
    text-decoration: none;
    padding: 10px;
    border-radius: 5px;
    font-family: 'Neuton', serif;

  }

  .navbar-container #headerl a:hover {
    background-color: rgba(0, 0, 0, 0.1);
  }

  .navbar-container #headerl i {
  margin-right: 10px;
  font-size: 20px; /* Increase the font size */
  cursor: pointer;
  color: red; /* Add color */
}

  
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
  font-size: 50px; /* Change the value to adjust the size of the icon */
}
</style>
</head>


<body class="navbar-page">
<div class="navbar-container">
<div id="logo">
    <a href="index-user.php"><img src="./Images/Logo.png"></a>
  </div>
  <div id="nav">
    <div class="header-list" id="headerl">
      <!-- <i class="fa fa-times" onclick="hideMenu()"></i> -->
      <ul>
        <?php
// include 'connect.php';
// include 'navbar.php';
// $hospital=$_SESSION['HospitalName'];

// to check which navbar to serve 
$UserEmail=$_SESSION['UserEmail'];
$email="select * from userTable where Email='$UserEmail'";
$qu=mysqli_query($conn,$email);
$user=mysqli_fetch_assoc($qu);
$Type=$user['UserType'];

if($Type=='User'){
  ?>
<li><a href="index-user.php"><i class="fa fa-home"></i></a></li>
  <?php }
  else{
    ?>
    <li><a href="index-admin.php"><i class="fa fa-home"></i></a></li>
    <?php
  }

    ?>
        <!-- <li><a href="index-admin.php"><i class="fa fa-home"></i></a></li> -->
        <li><a class="scroll" href="./index-user.php#about-us">About Us</a></li>
        <li><a href="./index-user.php#vol-sect" target="">Admin</a></li>
        <li><a href="donate.html" target="">Donate</a></li>
        <li><a href="donate.html" target="">Request</a></li>
        <li><a  href="camptable.php">Camps</a></li>
        <li><a href="help.php" target="">Get Help</a></li>
        <!-- <li><a href="#" id="profile-icon" onclick="openSidebar()"><i class="fa-solid fa-user"></i></a></li> -->
        <li class="icon"><a href="#" id="profile-icon" onclick="showPopup()"><i class="fas fa-user-circle" style="font-size:30px;"></i></a></li>
        <li><a href="javascript:history.go(-1)"><i class="fa fa-arrow-left"></i></a></li>
      </ul>
    </div>
    <!-- <i class="fa fa-bars" onclick="showMenu()"></i> -->
  </div>

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
    <a href="./index.php" class="logout-btn">Logout</a>
    <!-- <a href="./help.php" class="logout-btn">Get Help</a> -->
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