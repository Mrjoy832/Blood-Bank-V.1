<?php
session_start();
// include 'navbar-admin.php';
// session_start();
// include 'connect.php';
// // include 'navbar.php';
// $hospital=$_SESSION['HospitalName'];

// // to check which navbar to serve 
// $UserEmail=$_SESSION['UserEmail'];
// $email="select * from userTable where Email='$UserEmail'";
// $qu=mysqli_query($conn,$email);
// $user=mysqli_fetch_assoc($qu);
// $Type=$user['UserType'];

// if($Type=='Admin'){include 'navbar-admin.php';}
// else if($Type=='User'){include 'navbar.php';}
// to check which navbar to serve 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Popup Form Example</title>
	<style>
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

 #pop{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
  width:900px;
  font-size: 40px;
  color: white;
  background-color: red;
  text-decoration: none;
  border-radius: 50px;
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);
  font-family: "Impact", sans-serif;
  /* text-transform: uppercase; */
}

.home  #home-button {
    position: absolute;
    top: 10px;
    right: 10px;
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
<body>
	
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

	else{?>
		<button id="home-button" ><a href="index-admin.php" style="text-decoration:none;color: white;"> Home</a></button>
<?php
	}
	
?>
</div>

	<a href="#" onclick="showPopup()" id="pop">Check If You are eligible to donate or Not?</a>
	<div class="popup-overlay" id="popup-overlay"></div>
	<div class="popup" id="popup">
		<span class="close" onclick="closePopup()">&times;</span>
		<form onsubmit="return validateForm()">
			<h2>Prior Diseases</h2>
		<p>Have you ever had any of the following?</p>
		<label for="cancer">Cancer:</label>
		<input type="radio" id="cancer_yes" name="cancer" value="yes">
		<label class="yes" for="cancer_yes">&#9989; Yes</label>
		<input type="radio" id="cancer_no" name="cancer" value="no">
		<label class="no" for="cancer_no">&#10060; No</label><br>

		<label for="hepatitis">Hepatitis:</label>
		<input type="radio" id="hepatitis_yes" name="hepatitis" value="yes">
		<label class="yes" for="hepatitis_yes">&#9989; Yes</label>
		<input type="radio" id="hepatitis_no" name="hepatitis" value="no">
		<label class="no" for="hepatitis_no">&#10060; No</label><br>

		<label for="hiv">HIV:</label>
		<input type="radio" id="hiv_yes" name="hiv" value="yes">
		<label class="yes" for="hiv_yes">&#9989; Yes</label>
		<input type="radio" id="hiv_no" name="hiv" value="no">
		<label class="no" for="hiv_no">&#10060; No</label><br>

		<label for="malaria">Malaria:</label>
		<input type="radio" id="malaria_yes" name="malaria" value="yes">
		<label class="yes" for="malaria_yes">&#9989; Yes</label>
		<input type="radio" id="malaria_no" name="malaria" value="no">
		<label class="no" for="malaria_no">&#10060; No</label><br>


		<label for="sickle_cell">sickle_cell:</label>
		<input type="radio" id="sickle_cell_yes" name="sickle_cell" value="yes">
		<label class="yes" for="sickle_cell_yes">&#9989; Yes</label>
		<input type="radio" id="sickle_cell_no" name="sickle_cell" value="no">
		<label class="no" for="sickle_cell_no">&#10060; No</label><br>

        <input type="submit" value="Submit">
		</form>
	</div>
	<script>
		function showPopup() {
			document.getElementById("popup-overlay").style.display = "block";
			document.getElementById("popup").style.display = "block";
		}

		function closePopup() {
			document.getElementById("popup-overlay").style.display = "none";
			document.getElementById("popup").style.display = "none";
		}


        // JS validation for prior desease
        function validateForm() {
			// Get the values of the radio buttons
			var cancer = document.querySelector('input[name="cancer"]:checked');
			var hepatitis = document.querySelector('input[name="hepatitis"]:checked');
			var hiv = document.querySelector('input[name="hiv"]:checked');
			var malaria = document.querySelector('input[name="malaria"]:checked');
			var sickle_cell = document.querySelector('input[name="sickle_cell"]:checked');
			
			// Check if all questions are answered
			if (!cancer || !hepatitis || !hiv || !malaria || !sickle_cell) {
				alert("Please answer all questions before submitting the form.");
				return false;
			}
			
			// Check if donor is eligible to donate blood
			if (cancer.value === "yes" || hepatitis.value === "yes" || hiv.value === "yes" || malaria.value === "yes" || sickle_cell.value === "yes") {
				alert("Sorry, you are not eligible to donate blood.");
				return false;
			}
			
			// If all checks pass, the form is valid
			alert("Thank you for completing the questionnaire.\n You are eligible to donate blood.");
			window.location.href = "./testing.php";
        return false;
		}
	</script>
</body>
</html>
