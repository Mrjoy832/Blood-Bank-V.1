
<?php

session_start();
// Check if the session variable exists or not
if (!isset($_SESSION['NameToDisplay'])) {
    // If the session variable does not exist, display the alert and redirect to the login page
    echo '<script>alert("You are logged out."); window.location.href = "index.php";</script>';
    exit(); // Terminate the script execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href='./Images/bb_logo(white).png' type="image/png">
    <link rel="stylesheet" href='index.css'>
    <link rel="stylesheet" href='https://fontawesome.com/v4.7.0/icon/bars'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Add this line to set the zoom size to 80% -->
    <!-- <style>body {zoom: 95%;}</style> -->
    <style>
        /* style only for the Profile Page  */
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
/* style of profile page ends */

#logo > a > img {
  width: 50%;
}
    </style>
</head>
<title>BLOOD BANK</title>
<div class="preloader">
    <img src="pre-loader.svg" alt="spinner">
</div>

<body>
    <!--Scroll to top button-->
    <button onclick="topFunction()" id="myBtn" class="fas fa-arrow-up"></button>
    <!-- Home Page -->
    <header>
        <video autoplay muted loop plays-inline id="homevideo">
            <source src="./video/homevideo1.mp4" type="video/mp4">
        </video>
        <div id="logo"> <a href="index.html"><img src="./Images/Logo.png"></a>
        </div>
        <div id="nav">
            <div class="header-list" id="headerl">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a class="scroll" href="#about-us">About Us</a></li>
                    <li><a href="#vol-sect" target="">Admin</a></li>
                    <li><a href="donate.html" target="">Donate</a></li>
                    <li><a href="donate.html" target="">Request</a></li>
                    <li><a href="HospitalList.php" target="">Hospital List</a></li>
                    <li><a   href="addCamp.php">Camps</a></li>
                    <li><a href="history.php" target="">History</a></li>
                    <li><a href="#" id="profile-icon" onclick="showPopup()"><i class="fas fa-user-circle"></i></a></li>

                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </div>
        <div class="text-box">
            <h1> Start </h1>
            <h1>Saving Lives </h1>
            <br>
            <p>Become a donor or request for blood And help save lives ..</p>
            <a href='search.php' class="hero-btn">DONATE</a>
            <!-- To display dynamic name from login page  -->
            <h2 style="color:red;font-size:32px;font-family:'Courier New', Courier, monospace;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome Admin..<?php echo " ".$_SESSION['NameToDisplay']." ";?> to the portal :)</h2>
        </div>
    </header>

    <!--ABOUT US -->

    <main>
        <section id="about-us">
            <div class="about">
                <h1 class="heading">What is this all about ?</h1> <br>
                <p class="head-des" class="text">We solve the problem of blood emergencies by connecting <span
                        class="one-line"><br></span> blood donors directly with people in blood need. </p>
                <div class="row">
                    <div class="about-col">
                        <div class="image">
                            <img src="./Images/drop.png">
                        </div>
                        <h3>What we do ?</h3>
                        <p>We connect blood donors with recipients, without any intermediary such as blood banks, for an
                            efficient and seamless process.</p>
                    </div>
                    <div class="about-col">
                        <div class="image">
                            <img src="./Images/innovation.png">
                        </div>
                        <br>
                        <h3>Innovative</h3>
                        <p>It is an innovative approach to address global health.We provide <span>immediate
                                access</span> to blood donors.</p>
                    </div>
                    <div class="about-col">
                        <div class="image">
                            <img src="./Images/netwotk.png">
                        </div>
                        <h3>Network</h3>
                        <p>This is one of several community organizations that responds to emergencies  by providing access of Nearest Blood Banks.</p>
                    </div>
                    <div class="about-col">
                        <div class="image">
                            <img src="./Images/noti.png">
                        </div>
                        <h3>Get notified</h3>
                        <p>Blood Buddy Connect works with network partners to connect blood donors and recipients
                            through an automated SMS service and a mobile app.</p>
                    </div>
                    <div class="about-col">
                        <div class="image">
                            <img src="./Images/cost.png">
                        </div>
                        <h3>Totally Free</h3>
                        <p>It's ultimate goal is to provide an easy -to-use, easy-to-access, fast, efficient,
                            and reliable way to get life-saving blood, totally <span>Free of cost.</span></p>
                    </div>
                    <div class="about-col">
                        <div class="image">
                            <img src="./Images/save.png">
                        </div>
                        <h3>Save Life</h3>
                        <p>We are a non profit foundation and our main objective is to make sure that everything is done
                            to protect vulnerable persons.<span>Help
                                us by making a gift!</span></p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Volunteer Section -->

    <div class="volunteer" section id="vol-sect">
        <div class="title-head">
            <!-- <h1 class="title">Our Admins </h1> -->
            <h1>Our Admins </h1>
        </div>
        <!-- <p class="content">We depend on volunteers! Volunteers make up 96% of our total<span class="line"><br></span>
            workforce and carry on our humanitarian work. Blood donation is healthy,<span class="line"><br></span> our
            volunteers are available 24/7 to help and donate
            blood. Blood banks store blood<span class="line"><br></span> bags but our volunteers are there with you in
            an emergency for a blood transfusion real time.</p> -->
        <ul class="volunt">
            <li class="vol">
                <span class=" vol-i number">1 </span>
                <span class=" vol-i name">TRIDIB BAG</span>
                <span class=" vol-i location">Kolaghat,<br>India</span>
                <span class=" vol-i blood group">A+<i class="fa fa-tint" aria-hidden="true"></i>
                </span>
            </li>
            <li class="vol">
                <span class=" vol-i number">2</span>
                <span class=" vol-i name">AMIT MANNA</span>
                <span class=" vol-i location">Bauria,<br>India</span>
                <span class=" vol-i blood group">B+<i class="fa fa-tint" aria-hidden="true"></i>
                </span>
            </li>
            <li class="vol">
                <span class=" vol-i number">3</span>
                <span class=" vol-i name">SOUMYA MONDAL</span>
                <span class=" vol-i location">Kolaghat,<br>India</span>
                <span class=" vol-i blood group">AB+<i class="fa fa-tint" aria-hidden="true"></i>
                </span>
            </li>
        </ul>
    </div>
    <!--REVIEW-->
    <section class="customer-review" section id="camp-sect">
        <div class="row-customer" >
            <h2>BLOOD DONATION CAMPS<br>in your nearest Centres</h2>
        </div>
        <div class="row-customer" >
            <div class="col-customer span-1-of-3-customer customer-box">
                <div class="customer-text-box" class="about-col">
                   
                    <h2>ABC Hospital</h2><ul>
    
                    </ul>
                    <li><i class="fas fa-address-book"></i> Kolaghat</li>
                    <li><i class="fas fa-phone"></i> +91-8327897652</li>
                    <li><i class="fas fa-time"></i> 10.00 AM</li>
                   </ul>
                </div>
                <div class="customer">
                    <img src="Images/review-3.PNG" alt="Customer photo">
                    <p>Esha Puri </p>
                </div>
            </div>

            <div class="col-customer span-1-of-3-customer customer-box">
                <div class="customer-text-box" class="about-col">
                   
                    <h2>ABC Hospital</h2><ul>
    
                    </ul>
                    <li><i class="fas fa-address-book"></i> Kolaghat</li>
                    <li><i class="fas fa-phone"></i> +91-8327897652</li>
                    <li><i class="fas fa-time"></i> 10.00 AM</li>
                   </ul>
                </div>
                <div class="customer">
                    <img src="Images/review-3.PNG" alt="Customer photo">
                    <p>Esha Puri </p>
                </div>
            </div>
            <div class="col-customer span-1-of-3-customer customer-box">
                <div class="customer-text-box" class="about-col">
                   
                    <h2>ABC Hospital</h2><ul>
    
                    </ul>
                    <li><i class="fas fa-address-book"></i> Kolaghat</li>
                    <li><i class="fas fa-phone"></i> +91-8327897652</li>
                    <li><i class="fas fa-time"></i> 10.00 AM</li>
                   </ul>
                </div>
                <div class="customer">
                    <img src="Images/review-3.PNG" alt="Customer photo">
                    <p>Esha Puri </p>
                </div>
            </div>
    </section>

    <!--FOOTER-->

    <footer>
        <div class="siteFooterBar">
            <div class="content1">
                <div class="foot">2023 © All rights reserved.</div>
            </div>
        </div>
        <div class="footer-content">
            <h3>JOIN OUR CAUSE</h3>
            <p>Donating blood or platelets can be intimidating and even scary. Time to put those hesitations
                and
                fears
                aside. Learn from Blood Buddy and platelet donors how simple and easy it is to roll up a
                sleeve
                and help
                save lives.</p>
            <div class="socials">
                <ul class="sci">
                    <li><a href="https://www.facebook.com/tridib.bag.96/" target="_blank"><i
                                class="fab fa-facebook"></i></a>
                    </li>
                    <li><a href="https://www.instagram.com/tridibbag56/" target="_blank"><i
                                class="fab fa-instagram"></i></a></li>
                    <li><a href="https://github.com/Mrjoy832" target="_blank"><i class="fas fa-globe"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- profile side bar -->
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
    <a href="./personalDonation.php" onclick="closeProfileBar()" class="donate-history-btn" style="text-decoration:none;">Donate History</a>
    <a href="./personalRequest.php" class="request-history-btn" style="text-decoration:none;">Request History</a>
    <a href="./index.php" class="logout-btn" style="text-decoration:none;">Logout</a>
  </div>
</div>

	</div>
<!-- Profile page sidebar HTML -->


    <!--Javascript for pre-loader-->

    <script>
        // Profile page Side bar js 
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
// profile page sidebar closes

        // 
        const preloader = document.querySelector('.preloader');
        const fadeEffect = setInterval(() => {
            if (!preloader.style.opacity) {
                preloader.style.opacity = 1;
            }
            if (preloader.style.opacity > 0) {
                preloader.style.opacity -= 1.5;
            } else {
                clearInterval(fadeEffect);
            }
        }, 1500);
        window.addEventListener('load', fadeEffect);
    </script>
    <!--js for scroll to top-->
    <script src="up.js"></script>

    <!--JAVASCRIPT FOR TOGGLE MENU -->
    <script>
        var headerl = document.getElementById("headerl");

        function showMenu() {
            headerl.style.right = "0";
        }

        function hideMenu() {
            headerl.style.right = "-210px";
        }
    </script>


    <!--js for scroll effects-->
    <script src="scroll.js"></script>

</body>

</html>