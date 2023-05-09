<?php
session_start();
$hospital=$_SESSION['HospitalName'];

include 'connect.php';

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




// if the form is submitted, deduct the input amount from the selected blood group stock
if(isset($_POST['SUBMIT'])) {
    // Get the blood group and the amount to be deducted from the form
   
    $amount = $_POST['amount'];
    $blood_group = $_POST['blood_group'];
    
  
    // Deduct the amount from the corresponding stock variable
    switch($blood_group) {
      case 'a+':
        $Apos -= $amount;
        break;
      case 'a-':
        $Aneg -= $amount;
        break;
      case 'b+':
        $Bpos -= $amount;
        break;
      case 'b-':
        $Bneg -= $amount;
        break;
      case 'ab+':
        $ABpos -= $amount;
        break;
      case 'ab-':
        $ABneg -= $amount;
        break;
      case 'o+':
        $Opos -= $amount;
        break;
      case 'o-':
        $Oneg -= $amount;
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
        <script>alert("You are now a Successfull donar)");</script>
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
	<title>Blood Donation Stock Update</title>
	<style type="text/css">
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		  padding: 10px;
		  text-align: center;
		}
		input[type=submit] {
		  background-color: #4CAF50;
		  color: white;
		  padding: 10px;
		  border: none;
		  border-radius: 5px;
		  cursor: pointer;
		}

       /* Blood Donation Stock Update CSS */
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

h1 {
  color: #b30000;
  text-align: center;
  margin-top: 30px;
}

h2 {
  color: #b30000;
  margin-top: 20px;
}

p {
  color: #4d4d4d;
  font-size: 18px;
  margin-bottom: 20px;
}

table {
  width: 80%;
  margin: 0 auto;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #b30000;
  padding: 10px;
  text-align: center;
}

th {
  background-color: #b30000;
  color: white;
}

td {
  background-color: #ffe6e6;
}

td#o- {
  background-color: #ff8080;
}

input[type=submit] {
  background-color: #b30000;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 20px;
}

select {
  padding: 10px;
  font-size: 18px;
}

form label {
  display: block;
  margin-bottom: 10px;
  color: #4d4d4d;
}

form input[type=number] {
  padding: 10px;
  font-size: 18px;
}

/* Emojis */
td#a+::after {
  content: "\1F4A5";
  margin-left: 10px;
}

td#a-::after {
  content: "\1F4A6";
  margin-left: 10px;
}

td#b+::after {
  content: "\1F4A7";
  margin-left: 10px;
}

td#b-::after {
  content: "\1F4A8";
  margin-left: 10px;
}

td#ab+::after {
  content: "\1F4A9";
  margin-left: 10px;
}

td#ab-::after {
  content: "\1F4AA";
  margin-left: 10px;
}

td#o+::after {
  content: "\1F4AB";
  margin-left: 10px;
}

td#o-::after {
  content: "\1F480";
  margin-left: 10px;
}


	</style>
</head>
<body>
	<h1>Blood Donation Stock Update</h1>
	<p>Welcome to the Blood Donation Stock Update page for <?php echo($_SESSION['HospitalName']); ?></p>
    <table>
        <thead>
            <tr>
                <th>Blood Group</th>
                <th>Stock (in Lt)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>A+</td>
                <td id="a+" name="apos"><b><?php echo($Apos); ?></b></td>
            </tr>
            <tr>
                <td>A-</td>
                <td id="a-" name="aneg"><b><?php echo($Aneg); ?></b></td>
            </tr>
            <tr>
                <td>B+</td>
                <td id="b+" name="bpos"><b><?php echo($Bpos); ?></b></td>
            </tr>
            <tr>
                <td>B-</td>
                <td id="b-" name="bneg"><b><?php echo($Bneg); ?></b></td>
            </tr>
            <tr>
                <td>AB+</td>
                <td id="ab+" name="abpos"><b><?php echo($ABpos); ?></b></td>
            </tr>
            <tr>
                <td>AB-</td>
                <td id="ab-" name="abneg"><b><?php echo($ABneg); ?></b></td>
            </tr>
            <tr>
                <td>O+</td>
                <td id="o+" name="opos"><b><?php echo($Opos); ?></b></td>
            </tr>
            <tr>
                <td>O-</td>
                <td id="o-" name="oneg"><b><?php echo($Oneg); ?></b></td>
            </tr>
        </tbody>
    </table>
    
    <h2>Request Blood</h2>
    <p>Please enter the amount of blood you need (in Lt) for a particular blood group:</p>
    <form id="blood-form" method="POST">
        <label for="blood-group">Blood Group:</label>
        <select id="blood-group" name="blood_group">
            <option value="a+">A+</option>
            <option value="a-">A-</option>
            <option value="b+">B+</option>
            <option value="b-">B-</option>
            <option value="ab+">AB+</option>
            <option value="ab-">AB-</option>
            <option value="o+">O+</option>
            <option value="o-">O-</option>
        </select><br><br>
    
        <label for="amount">Amount (in Lt):</label>
        <input type="number" id="amount" name="amount" min="1" max="1000" required><br><br>
    
        <input type="submit" value="Submit" name="SUBMIT">
    </form>
    
    <!-- <script>
        const form = document.getElementById("blood-form");
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            const bloodGroup = form.elements["blood-group"].value;
            const amount = parseInt(form.elements["amount"].value);
    
            if (bloodGroup === "" || amount === "") {
                alert("Please select a blood group and enter an amount");
                return;
            }
    
            const stock = document.getElementById(bloodGroup);
            const currentStock = parseInt(stock.innerText);
            if (amount >			currentStock) {
			alert("Not enough stock available for the selected blood group");
			return;
		}

		const newStock = currentStock - amount;
		stock.innerText = newStock;

		alert("Requested blood successfully. The remaining stock for " + bloodGroup.toUpperCase() + " is " + newStock + " Lt.");
		form.reset();
	});
</script> -->
</body>
</html>
    
<?php

//for sending mail of Blood Request
require 'requestMail.php';

if(isset($_POST['SUBMIT'])){

$name="Joy";//later will take by session
$email='tridib234@gmail.com';//later will take by session
$phone=9876543261;//later will take by session
$address='ktpp kolaghat new';//later will take by session
$dob='2002-02-27';//later will take by session
$hospital;//already taken by session
$blood_group;
$amount;

sendMail($name,$email,$phone,$address,$dob,$hospital,$blood_group,$amount);
?>
	<script>alert("Your request is approved")</script>
	<?php



}
    ?>
