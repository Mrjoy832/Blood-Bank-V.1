<?php
session_start();
?>


<html>
<head>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Neuton&display=swap">
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
    font-size: 20px;
    cursor: pointer;
    color: black;
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

</style>
</head>


<body>
<div id="logo">
    <a href="index.html"><img src="./Images/Logo.png"></a>
  </div>
  <div id="nav">
    <div class="header-list" id="headerl">
      <!-- <i class="fa fa-times" onclick="hideMenu()"></i> -->
      <ul>
        <li><a class="scroll" href="#about-us">About Us</a></li>
        <li><a href="#vol-sect" target="">Admin</a></li>
        <li><a href="donate.html" target="">Donate</a></li>
        <li><a href="donate.html" target="">Request</a></li>
        <li><a target="_blank" href="camptable.php">Camps</a></li>
        <li><a href="help.html" target="">Get Help</a></li>
        <!-- <li><a href="#" id="profile-icon" onclick="openSidebar()"><i class="fa-solid fa-user"></i></a></li> -->
        <li><a href="#" id="profile-icon" onclick="showPopup()"><i class="fa-solid fa-user"></i></a></li>
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
    <a href="./logout.php" class="logout-btn">Logout</a>
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