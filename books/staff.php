<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level_user'])) {
    $username = $_SESSION['username'];
    $level_user = $_SESSION['level_user'];

    if ($level_user=='staff') {
        echo "Anda sebagai Staff, Anda berhak mengakses halaman ini.";
    } else {
        echo "Anda tidak berhak mengakses halaman ini.";
    }

} else {
    header("Location: login.php"); // redirect to login.php if failed
}
?>