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

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Make hash from password using PASSWORD_BCRYPT algoritm
    $hash = password_hash($password, PASSWORD_BCRYPT);

    // include file connect.php
    include_once("connect.php");

    // Check if the username already exists in the database
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username'");
    $count = mysqli_num_rows($result);

    if($count == 0) {
        // username doesn't exist, proceed with insertion
        mysqli_query($mysqli, "INSERT INTO users(username,password) VALUES('$username','$hash')"); 

        // Redirect page to datatable.php
        header("Location: login.php");
    } else {
        // username already exists, handle accordingly (e.g., show an error message)
       echo "<div class='alert alert-danger' role='alert'>Username already exists in the database.</div>";
    }
}
?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <form action="register.php" method="post">
            <div class="mb-3">
                <labe class="form-label">username</labe>
                <input type="text" name="username" class="form-control" placeholder="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">password</label>
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>

            <br>
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
            <a href="index.php" class="btn btn-default">Cancel</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>