<?php
// call file connect.php
include_once("connect.php");
// get isbn from URL
$isbn = $_GET['isbn'];
// Delete rows of data by isbn
mysqli_query($mysqli, "DELETE FROM books WHERE ISBN=$isbn");
// Redirect page to show.php
header("Location:datatable.php");
?>