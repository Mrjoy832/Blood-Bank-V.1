<?php

include 'connect.php';
// include 'navbar.php';


$Hospitals= $_GET['Hospitals'];
// echo($Hospitals);
$show="select * from hospitallisttable where HospitalName='$Hospitals'";
$query2=mysqli_query($conn,$show);

$arr=mysqli_fetch_array($query2);

if(isset($_POST['REGISTER'])){
    $HospitalUpdate=$_GET['Hospitals'];

$HospitalName1= $_POST['hospitalName'];
$Address1= $_POST['address'];
$Email1= $_POST['email'];
$phone1= $_POST['phone'];
$aPlusStock= $_POST['aPlusStock'];
$aMinusStock= $_POST['aMinusStock'];
$bPlusStock= $_POST['bPlusStock'];
$bMinusStock= $_POST['bMinusStock'];
$oPlusStock= $_POST['oPlusStock'];
$oMinusStock= $_POST['oMinusStock'];
$abPlusStock= $_POST['abPlusStock'];
$abMinusStock= $_POST['abMinusStock'];



//to insert into db
// $insert="insert into camptable(HospitalName,Address,Date,Time,Phone, Comments) values ('$Hospital', '$Address', '$Date', '$Time','$Ph','$Details')";

//update DB
$update="update Hospitallisttable set  HospitalName='$HospitalName1', HospitalAddress='$Address1', Email='$Email1', Phone='$phone1', `Stock-A+`='$aPlusStock', 
`Stock-A-`='$aMinusStock', `Stock-B+`='$bPlusStock',`Stock-B-`='$bMinusStock',`Stock-AB+`='$abPlusStock',`Stock-AB-`='$abMinusStock',`Stock-O+`='$oPlusStock',`Stock-O-`='$oMinusStock' where 
HospitalName='$HospitalUpdate'";

$query3=mysqli_query($conn,$update);//connection come from connection.php's 16th line

if($query3){
  ?>
      <script>
          window.opener.location.reload(); // Reload the previous window
          window.close(); // Close the current window
          window.location.href = "./HospitalList.php"; // Redirect to the desired location
      </script>
  <?php
}
}


?>




<style>
        /* edit form  */
        h2 {
  text-align: center;
  font-family: 'Neuton', serif;
  color: #6b0c12;
  margin-bottom: 20px;
}

label {
  /* display: block; */
  margin-bottom: 10px;
  font-family: 'Neuton', serif;
  /* font-size: 16px; */
  color: #333;
}

input[type="text"], 
input[type="email"], 
input[type="tel"], 
textarea {
  /* width: 100%; */
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-family: Arial, sans-serif;
  /* font-size: 16px; */
  color: #555;
  /* margin-bottom: 20px; */
}

input[type="submit"] {
  background-color: #ed1a28;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-family: Arial, sans-serif;
  
  /* font-size: 16px; */
}


form {
  width: 350px;
  height: 900px;
  
  
}

</style>

<!--  -->
<!--edit button popup   -->
<!-- <div class="popupOverlay" id="popupOverlay"></div>
	<div class="popup-new" id="popup-new">
  <span class="closeButton" id="closeButton" onclick="close()">&times;</span> -->
  <form method="POST" action="">
    <h2>Update The Hospital Details </h2>
  <label for="hospitalName">Hospital Name:</label>
  <input type="text" id="hospitalName" name="hospitalName" value="<?php echo($arr['HospitalName']); ?>"><br><br>
  
  <label for="address">Address:</label>
  <input type="text" id="address" name="address" value="<?php echo($arr['HospitalAddress']); ?>"><br><br>
  
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" value="<?php echo($arr['Email']); ?>"><br><br>
  
  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone" value="<?php echo($arr['Phone']); ?>"><br><br>
  
  <label for="aPlusStock">A+ Stock:</label>
  <input type="number" id="aPlusStock" name="aPlusStock" value="<?php echo($arr['Stock-A+']); ?>"><br><br>
  
  <label for="aMinusStock">A- Stock:</label>
  <input type="number" id="aMinusStock" name="aMinusStock" value="<?php echo($arr['Stock-A-']); ?>"><br><br>
  
  <label for="bPlusStock">B+ Stock:</label>
  <input type="number" id="bPlusStock" name="bPlusStock" value="<?php echo($arr['Stock-B+']); ?>"><br><br>
  
  <label for="bMinusStock">B- Stock:</label>
  <input type="number" id="bMinusStock" name="bMinusStock" value="<?php echo($arr['Stock-B-']); ?>"><br><br>
  
  <label for="oPlusStock">O+ Stock:</label>
  <input type="number" id="oPlusStock" name="oPlusStock" value="<?php echo($arr['Stock-O+']); ?>"><br><br>
  
  <label for="oMinusStock">O- Stock:</label>
  <input type="number" id="oMinusStock" name="oMinusStock" value="<?php echo($arr['Stock-O-']); ?>"><br><br>
  
  <label for="abPlusStock">AB+ Stock:</label>
  <input type="number" id="abPlusStock" name="abPlusStock" value="<?php echo($arr['Stock-AB+']); ?>"><br><br>
  
  <label for="abMinusStock">AB- Stock:</label>
  <input type="number" id="abMinusStock" name="abMinusStock" value="<?php echo($arr['Stock-AB-']); ?>"><br><br>
  
  <input type="submit" value="Update" name="REGISTER" >
</form>

</div>
<!-- edit button popup ends -->

