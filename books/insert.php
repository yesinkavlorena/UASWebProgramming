
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Call css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php
if(isset($_POST['submit'])) {

    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $stock = $_POST['stock'];
    $type = $_POST['type'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    // include file connect.php
    include_once("connect.php");

    // Check if the ISBN already exists in the database
    $result = mysqli_query($mysqli, "SELECT * FROM books WHERE ISBN='$isbn'");
    $count = mysqli_num_rows($result);

    if($count == 0) {
        // ISBN doesn't exist, proceed with insertion
        mysqli_query($mysqli, "INSERT INTO books(ISBN, author, title, stock, type, year, description, date_added) VALUES('$isbn','$author','$title','$stock', '$type', '$year', '$description', NOW())"); 

        // Redirect page to datatable.php
        header("Location: datatable.php");
    } else {
        // ISBN already exists, handle accordingly (e.g., show an error message)
       echo "<div class='alert alert-danger' role='alert'>ISBN already exists in the database.</div>";
    }
}
?>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <form action="insert.php" method="post">
            <div class="mb-3">
                <labe class="form-label">ISBN</labe>
                <input type="number" name="isbn" class="form-control" placeholder="ISBN" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Author">
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" placeholder="stock">
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="text" name="type" class="form-control" placeholder="Type">
            </div>
            <div class="mb-3">
                <label class="form-label">Year</label>
                <input type="number" name="year" class="form-control" placeholder="Year">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
            <a href="index.php" class="btn btn-default">Cancel</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>