<?php
include 'connect.php';
$id = $_GET['id'];

$del = "delete from camptable where ID='$id'";
$query = mysqli_query($conn, $del);

if ($query) {
    echo '<script>alert("Event Successfully Deleted..");';
    echo 'window.location.href="camptable1.php";</script>';
} else {
    echo '<script>alert("Error in Deleting the Event..");';
    echo 'window.location.href="camptable1.php";</script>';
}
?>
