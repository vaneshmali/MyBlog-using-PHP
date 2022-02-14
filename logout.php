<?php
//logout
session_start();
session_destroy(); // destroy all session variables
header('Location:login.php'); // redirect to login page
?>