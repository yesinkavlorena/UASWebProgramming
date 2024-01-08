<?php
// start session
session_start();

// delete all variabel session
session_unset();

// destroy session
session_destroy();

// redirect login.php
header("Location: login.php");
?>