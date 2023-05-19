<?php
session_start();
include 'connect.php';
// include 'navbar.php';
$hospital=$_SESSION['HospitalName'];

// to check which navbar to serve 
$UserEmail=$_SESSION['UserEmail'];
$email="select * from userTable where Email='$UserEmail'";
$qu=mysqli_query($conn,$email);
$user=mysqli_fetch_assoc($qu);
$Type=$user['UserType'];

if($Type=='Admin'){include 'navbar-admin.php';}
else if($Type=='User'){include 'navbar.php';}
// to check which navbar to serve 

// echo($_SESSION['HospitalName']);
$hospital=$_SESSION['HospitalName'];
$stock_search=" select * from hospitallisttable where HospitalName= '$hospital'";
$query=mysqli_query($conn, $stock_search);
$stock=mysqli_fetch_assoc($query);

$Apos=$stock['Stock-A+'];
$Aneg=$stock['Stock-A-'];
$Bpos=$stock['Stock-B+'];
$Bneg=$stock['Stock-B-'];
$ABpos=$stock['Stock-AB+'];
$ABneg=$stock['Stock-AB-'];
$Opos=$stock['Stock-O+'];
$Oneg=$stock['Stock-O-'];

if(isset($_POST['SUBMIT'])){
	$blood_group = $_POST['blood_group'];
	
	switch($blood_group) {
		case 'A+':
		  $Apos +=1;
		  break;
		case 'A-':
		  $Aneg +=1;
		  break;
		case 'B+':
		  $Bpos +=1;
		  break;
		case 'B-':
		  $Bneg +=1;
		  break;
		case 'AB+':
		  $ABpos +=1;
		  break;
		case 'AB-':
		  $ABneg +=1;
		  break;
		case 'O+':
		  $Opos +=1;
		  break;
		case 'O-':
		  $Oneg +=1;
		  break;
	  }

	      // Update the database with the new stock values
		  $update_query = "UPDATE hospitallisttable SET 
		  `Stock-A+` = '$Apos', 
		  `Stock-A-` = '$Aneg', 
		  `Stock-B+` = '$Bpos', 
		  `Stock-B-` = '$Bneg', 
		  `Stock-AB+` = '$ABpos', 
		  `Stock-AB-` = '$ABneg', 
		  `Stock-O+` = '$Opos', 
		  `Stock-O-` = '$Oneg' 
		  WHERE HospitalName = '$hospital'";
$query2=mysqli_query($conn, $update_query);

if($query2){
?>
<script>alert("You are now A Successfull donar 😎");</script>
<?php
}
else{
?>
<script>alert("incorrect Code:)");</script>
<?php
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blood Donation Form</title>
	<style>
		body {
			background-color: #f2d8e9;
			font-family: Arial, sans-serif;
			color: #333;
			font-size: 16px;
		}
		h1 {
			color: #b20d18;
			text-align: center;
		}
		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
			max-width: 600px;
			margin: 0 auto;
		}
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		input[type="text"],
		input[type="email"],
		input[type="tel"],
		input[type="date"],
		select {
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: none;
			margin-bottom: 10px;
			font-size: 16px;
			color: #333;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
			background-color: #f2f2f2;
		}
		input[type="submit"] {
			background-color: #b20d18;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #f44336;
		}
		.error {
			color: #b20d18;
			font-size: 14px;
			margin-bottom: 5px;
		}
	</style>
</head>
<body>
    <h1>Thanks for Choosing  <?php echo($_SESSION['HospitalName']); ?></h1>
	<h1>Blood Donation Form</h1>
	<form method="post" action="">
		<label for="patient_name">Patient Name:</label>
		<input type="text" name="patient_name" id="patient_name" value=<?php echo $_SESSION['NameToDisplay'] ?> required>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" value=<?php echo $_SESSION['UserEmail'] ?>  required>

		<label for="phone">Phone:</label>
		<input type="tel" name="phone" id="phone" value=<?php echo $_SESSION['UserPhone'] ?> required>

		<label for="dob">Date of Birth:</label>
		<input type="date" name="dob" id="dob" value=<?php echo $_SESSION['userDOB'] ?> required>

		<label for="address">Address:</label>
		<textarea name="address" id="address" value=<?php echo $_SESSION['userAddress'] ?> required></textarea>

		<label for="blood_group">Blood Group:</label>
		<select name="blood_group" id="blood_group" required>
			<option value="">Select Blood Group</option>
			<option value="A+">A+</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B-">B-</option>
			<option value="O+">O+</option>
			<option value="O-">O-</option>
			<option value="AB+">AB+</option>
			<option value="AB-">AB-</option>
		</select>

		<!-- <label for="age">Age:</label>
        <input type="text" id="age" name="age" required> -->
<br><br>

<br><br>

<input type="submit" value="Submit" name="SUBMIT">
</form>
<style>
body {
  background-color: #f7e6f2;
}

form {
  background-color: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px grey;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

label {
  font-weight: bold;
}

.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  border-radius: 10px;
  margin-top: 20px;
  display: none;
}
</style>
<script>
document.getElementById("myForm").addEventListener("submit", function(event) {
  var age = document.getElementById("age").value;
  if (age < 18) {
    event.preventDefault();
    var alert = document.getElementsByClassName("alert")[0];
    alert.style.display = "block";
  }
});

function hideAlert() {
  var alert = document.getElementsByClassName("alert")[0];
  alert.style.display = "none";
}
</script>
<div class="alert">
  <span onclick="hideAlert()" class="close">&times;</span>
  <strong>Error!</strong> Age should be 18 or above.
</div>
</body>
</html>

<!-- inserting donation data in DB -->

<?php


require 'DonationMail.php';

if(isset($_POST['SUBMIT'])){

$hospitalName= $_SESSION['HospitalName'];
$patientName= $_POST['patient_name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$dob= $_POST['dob'];
$address= $_POST['address'];
$blood_group= $_POST['blood_group'];


//if any condition required that will be considered later
$insert1= "insert into bloodtransaction(PatientName,Email,Phone,Address,DOB,HospitalName, BloodGroup, TransactionType,Amount) values('$patientName', 
'$email', '$phone', '$address', '$dob', '$hospitalName', '$blood_group', 'D', '1 ml') order by Time ASC";

$iquery=mysqli_query($conn, $insert1);

if($iquery){
	// For both send mail and store data
	sendMail($email, $patientName, $hospitalName, $blood_group);
	?>
	<script>alert("Thanks for Your Valuable donation\n Visit the Respective Hospital On Time...")</script>
	<?php
}
}

?>