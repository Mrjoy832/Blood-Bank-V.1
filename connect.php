<?php

$server= "localhost:3307";
$user= "root";
$password="";
$db="bloodbank";

$conn= mysqli_connect($server, $user, $password , $db);

if($conn){
  
   echo "connection success<br>";
      
}
else{
    echo "conn err";
}

?>