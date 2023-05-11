<?php
session_start();
session_unset();
session_destroy();
header('Location: Login.php'); // Redirect the user to the homepage or a relevant page
?>
