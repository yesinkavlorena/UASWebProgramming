<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level_user'])) {
    $username = $_SESSION['username'];
    $level_user = $_SESSION['level_user'];

    if ($level_user='admin') {
        echo "Anda sebagai Admin, Anda berhak mengakses halaman ini.";
    } else {
        echo "Anda tidak berhak mengakses halaman ini.";
    }

} else {
    header("Location: datatable.php"); // redirect to login.php if failed
}
?