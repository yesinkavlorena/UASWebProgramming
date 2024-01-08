<?php
// Start the session
session_start();

// Check if the session variable username is set
if(isset($_SESSION['username'])) {
    // Display the username
    echo "Welcome, " . $_SESSION['username'];
} else {
    // Redirect to login page
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Call css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Add Javascript DataTables -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<!-- Add css DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script>
        $(document).ready( function () {
            $('#myTable').DataTable(
                {
                "order": []
         }
            );
        } );
</script>
<script language="JavaScript" type="text/javascript">
        function deleteData(isbn){
	        if (confirm("Are you sure you want to delete this data?")){
	            window.location.href = 'delete.php?isbn=' + isbn;
	        }
        }
</script>
</head>
<body>
        <br>
        <br>
        <a href="insert.php" class="btn btn-primary">Add</a>
        <br>
        <br>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    <?php
    // Call file connect.php
    include_once("connect.php");
    // Retrieve all data from "books"
    $result = mysqli_query($mysqli, "SELECT * FROM books ORDER BY date_added DESC");
    ?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Year</th>
                        <th>Description</th>
                        <th>Date added</th>
                        <th>Date Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    
                        while($data = mysqli_fetch_array($result)) {         
                            echo "<tr>";
                            echo "<td>".$data['ISBN']."</td>";
                            echo "<td>".$data['author']."</td>";
                            echo "<td>".$data['title']."</td>";
                            echo "<td>".$data['price']."</td>";
                            echo "<td>".$data['type']."</td>";
                            echo "<td>".$data['year']."</td>";
                            echo "<td>".$data['description']."</td>";
                            echo "<td>".$data['date_added']."</td>"; 
                            echo "<td>".$data['date_updated']."</td>"; 
                            echo "<td><a class='btn btn-primary btn-xs' href='edit.php?isbn=$data[ISBN]'>Edit</a><a class='btn btn-danger btn-xs' href='#' onclick='deleteData($data[ISBN])'>Delete</a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>