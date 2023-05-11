<?php

include 'connect.php';

session_start();

echo $_SESSION['NameToDisplay'];
echo $_SESSION['UserEmail'];
echo $_SESSION['UserPhone'];
echo $_SESSION['userDOB'];
echo $_SESSION['userAddress'];

?>