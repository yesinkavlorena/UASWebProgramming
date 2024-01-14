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
<html>  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <br>
    <a href="datatable.php" class="btn btn-primary">Next</a>
</html>