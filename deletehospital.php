<?php
include 'connect.php';

$hospitalName=$_GET['Hospital'];

$del = "delete from hospitallisttable where HospitalName='$hospitalName'";
$query = mysqli_query($conn, $del);

if ($query) {
    echo '<script>alert("Selected Hospital is Deleted.");';
    echo 'window.location.href="HospitalList.php";</script>';
} else {
    echo '<script>alert("Error in Deleting the Hospital..");';
    echo 'window.location.href="HospitalList.php";</script>';
}



?>