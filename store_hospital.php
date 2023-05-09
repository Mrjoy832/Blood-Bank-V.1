
<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Hospital Details</title>
	<style>
		table {
			font-family: Arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		button {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 8px 16px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 14px;
			margin: 4px 2px;
			cursor: pointer;
		}

		.donate-btn {
			background-color: #4CAF50;
		}

		.request-btn {
			background-color: #f44336;
		}
	</style>
	<script>
		function showPopup() {
			var popup = window.open("priorCheck.php", "Popup", "width=800,height=650");
			popup.focus();
		}

		function openThirdPage() {
  if (window.top) {
    window.top.location.replace('stock1.php');
    window.close();
  } else {
    alert('Parent window is not available.');
  }
}

</script>


</head>
<body>
	<h2>Hospital Details:</h2>

	<?php
		if(isset($_GET['hospital']) && isset($_GET['address'])){
			$hospital = $_GET['hospital'];
			$address = $_GET['address'];
			$_SESSION['HospitalName']=$_GET['hospital'];//storing in a session var so that we can use in any other file 
			echo '<table>';
			echo '<tr><th>Name:</th><td>' . $hospital . '</td></tr>';
			echo '<tr><th>Address:</th><td>' . $address . '</td></tr>';
			echo '<tr><th>Contact Number:</th><td>9876543210</td></tr>';
			echo '<tr><th>Email:</th><td>hospital@example.com</td></tr>';
			echo '</table>';
			echo '<br>';
			echo '<button class="donate-btn" onclick="showPopup()">Donate</button>';
			echo '<button class="request-btn" onclick="openThirdPage()">Request</button>';
		}
		else{
			echo '<p>No hospital details found!</p>';
		}
	?>
</body>
</html>
