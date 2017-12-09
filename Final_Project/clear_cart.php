<?php
session_start();
//Kills the session which in turn clears all session variables that the cart uses.
//Note: This also kills login session variable
session_destroy();
header("Location: userLogin.php");
?>