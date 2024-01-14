<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Call css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <form action="login.php" method="post">
            <div class="mb-3">
                <labe class="form-label">username</labe>
                <input type="text" name="username" class="form-control" placeholder="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">password</label>
                <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">level_user</label>
                <input type="text" name="level_user" class="form-control" placeholder="admin/staff" required>
            </div>
            <br>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <a href="register.php" class="btn btn-default">Register</a>
            </form>
            </div>
        </div>
    </div>
    <?php
if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // include file connect.php
    include_once("connect.php");

    // Check if the username exists in the database
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username'");
    $count = mysqli_num_rows($result);

    if($count == 1) {
        // username exists, verify the password
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];

        $level_user = $row['level_user']; // get level_user

        if(password_verify($password, $hash)) {
            // password is correct, start a session and redirect to index.php
            session_start();
            $_SESSION['username'] = $username;

            // add level_user at session
            $_SESSION['level_user'] = $level_user; 

            // check level_user
            if($level_user == "admin") { 
                // redirect to admin.php
                header("Location: admin.php"); 
            } else if($level_user == "staff") { 
                // redirect to staff
                header("Location: staff.php"); 
            } else {
                // if login failed based on level user redirect to login.php
                header("Location: login.php"); 
            }

        } else {
            // password is incorrect, show an error message
            echo "<div class='alert alert-danger' role='alert'>Wrong password.</div>";
        }
    } else {
        // username doesn't exist, show an error message
        echo "<div class='alert alert-danger' role='alert'>Username not found.</div>";
    }
}
?>
</body>
</html>